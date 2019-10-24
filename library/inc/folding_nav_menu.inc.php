<?php
/*
Folding Menu by Mike Kunde

  A folding menu only expands as deep as it needs to. Think Drupal's admin menu.
  While you could achieve this with CSS (display:none) if you think about it, 
  that's really a hack because CSS was intended to manage style, not content. 
  Luckily, Wordpress makes it possible to generate a "context-aware" 
  menu that "knows" how far it needs to expand. So your visitors are only presented 
  with the links they asked for.  This is very mobile friendly because no javascript 
  is needed to dynamically show & hide nested lists.  Instead, sublevel links 
  are only displayed when it would make sense to show them.

DEVELOPER NOTES:
  We need to add a few variables to the $wp_query object so they 
  are globally available. The Walker object simply renders HTML line by line 
  as it goes; it is not aware of the overall structure of the whole nav heirarchy.
  Therefore we need a mechanism to keep track of what was done in the previous 
  Walker iteration so we can show or hide HTML output as needed.

  The following variables accomplish this:
    $wp_query->menu_unfold_skip_count     // keeps track of how many nested <ul>...</ul> pairs to omit
    $wp_query->menu_unfold_level[1]       // whether to continue 'unfolding' nested <li> elements
    $wp_query->menu_unfold_level[2]
    $wp_query->menu_unfold_level[x]
    $wp_query->menu_unfold_last_item      // id of last item rendered. for checking whether a closing </li> should be rendered or omitted
    $wp_query->menu_unfolded_depth        // level of unfolding for the current page. allows themer to apply extra css classes based on how deep menu structure is.
*/


class Folding_Menu_Walker extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth=0, $args=array() ) {
		global $wp_query;

/*
		$output .= '<pre>' . "\n";
		$output .= '  $wp_query->menu_unfold_level['.($depth+1).'] = ' . $wp_query->menu_unfold_level[($depth+1)] . "\n";
		$output .= '                           $depth = ' . $depth . "\n";
		$output .= '</pre>' . "\n";
*/

		$indent = str_repeat("\t", $depth);
		if ( $wp_query->menu_unfold_level[($depth+1)]==1 ) {
			$output .= "\n" . $indent . '<ul class="nav-level-'.($depth+2).'">' . "\n";
		} else {
			$wp_query->menu_unfold_skip_count++;
		}
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		global $wp_query;
		$indent = str_repeat("\t", $depth);
		if ( $wp_query->menu_unfold_skip_count==0 ) {
			$output .= $indent . '</ul><!-- /.nav-level-'.($depth+2).' -->' . "\n" . '</li>' . "\n";
		} else {
			$wp_query->menu_unfold_skip_count = $wp_query->menu_unfold_skip_count-1;
		}
	}






	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;

		// initialize some variables to manage the unfolding switches:
		if (!isset($wp_query->menu_unfold_level)) { $wp_query->menu_unfold_level=array(); }
		if (!isset($wp_query->menu_unfold_skip_count)) { $wp_query->menu_unfold_skip_count = 0; }
		if (!isset($wp_query->menu_unfolded_depth)) { $wp_query->menu_unfolded_depth=1; }
		$depth_limit = 5; // change as needed to fit your site
		$x = 0;
		do {
			if (!isset($wp_query->menu_unfold_level[$x])) { $wp_query->menu_unfold_level[$x]=0; }
			$x++;
		} while ($x <= $depth_limit);
		$x = 0;


		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;

		// iterate through levels and determine whether or not to unfold the next walk-through:
		// current-menu-item && menu-item-has-children
		do {
			if ( $depth==($x-1) && (in_array('current-menu-item', $classes) || in_array('current-menu-ancestor', $classes) ) ) {
				$wp_query->menu_unfold_level[$x]=1;
			} else if ( $depth==$x && $wp_query->menu_unfold_level[$x]==1 ) {
				$wp_query->menu_unfold_level[$x]=1;
			} else {
				$wp_query->menu_unfold_level[$x]=0;
			}
			$x++;
		} while ($x <= $depth_limit);
		unset ($x);


		if ( $depth==0 || $wp_query->menu_unfold_level[$depth]==1 || $wp_query->menu_unfold_skip_count==0) {
			$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
			$class_names = ' class="' . esc_attr($class_names) . '"';
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			$attributes	 = ! empty($item->attr_title) ? ' title="'	. esc_attr($item->attr_title) .'"' : '';
			$attributes .= ! empty($item->target)			? ' target="' . esc_attr($item->target		) .'"' : '';
			$attributes .= ! empty($item->xfn)				? ' rel="'		. esc_attr($item->xfn				) .'"' : '';
			$attributes .= ! empty($item->url)				? ' href="'		. esc_attr($item->url				) .'"' : '';
			$item->description = trim($item->description);
			$description = ! empty($item->description) ? $item->description : ''; // optional: item description field rendered out in the <li>
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before;
//			$item_output .= '<span class="devel">[' . $depth . ']</span>';
			$item_output .= apply_filters('the_title', $item->title, $item->ID);
			$item_output .= $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			$wp_query->menu_unfold_last_item = $item->ID;

			// push an element onto the $wp_query->post->ancestors array so we can generate breadcrumbs later
			if ( $wp_query->queried_object->post_type=='page' && in_array('current-menu-ancestor', $classes) ) {
				array_push($wp_query->post->ancestors, array ('menu_id'=>$item->ID,'title'=>apply_filters('the_title', $item->title, $item->ID),'url'=>esc_attr($item->url)));
			}

			if ( $wp_query->menu_unfolded_depth < $depth+1) {
				$wp_query->menu_unfolded_depth = $depth+1;
			}
		} else {
			$output .= '';
		}
			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}





	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		global $wp_query;
		if ( $wp_query->menu_unfold_last_item==$item->ID) {
			$output .=	'</li>'. '<!-- /.item-' . $item->ID . ' -->' . "\n";
		}
	}


}
