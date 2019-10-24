<?php
function bones_head_cleanup() {
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // category feeds
	remove_action( 'wp_head', 'feed_links', 2 ); // post and comment feeds
	remove_action( 'wp_head', 'rsd_link' ); // EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' ); // windows live writer
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // previous link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // links for adjacent posts
	remove_action( 'wp_head', 'wp_generator' ); // WP version
	remove_action('wp_head', 'print_emoji_detection_script', 7); // remove emoji icons
	remove_action('wp_print_styles', 'print_emoji_styles');      // remove emoji icons
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); // remove emoji icons (from admin)
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); // remove emoji icons (from admin)
	add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 ); // remove WP version from css
	add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 ); // remove WP version from scripts
}

// remove WP version from RSS
function bones_rss_version() { return ''; }

// remove WP version from scripts
function bones_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
		$src = add_query_arg( 'ver', time(), $src );
	}
	return $src;
}

// remove injected CSS for recent comments widget
function bones_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function bones_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function bones_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

// Scripts & Enqueueing
function bones_scripts_and_styles() {
  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  if (!is_admin()) {

		wp_deregister_script('jquery'); // we should use our own jQuery instead of WordPress’
		wp_deregister_script('jquery-migrate'); // not needed
		wp_deregister_script( 'wp-embed' ); // not needed
		//wp_enqueue_script( 'jquery-migrate', bones_theme_uri().'/library/js/libs/jquery-migrate-1.2.1.min.js', array(), '', false );
		//wp_register_script( 'bones-modernizr', bones_theme_uri().'/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

		wp_register_script( 'bones-jquery', bones_theme_uri().'/library/js/jquery-3.3.1.min.js', array(), '', true );
		wp_register_script( 'bones-bootstrap-js', bones_theme_uri().'/library/js/bootstrap.min.js', array('bones-jquery'), '', true );
		wp_register_script( 'bones-js', bones_theme_uri().'/library/js/scripts.js', array( 'bones-jquery' ), '', true );
		wp_register_script( 'bones-slick', bones_theme_uri().'/library/js/slick.min.js', array('bones-jquery'), '', true );
		wp_register_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?libraries=geometry', array('bones-jquery'), '', false );

	
		// register main stylesheet
		wp_register_style( 'bones-stylesheet', bones_theme_uri().'/library/css/style.css', array(), '', 'all' );
		//wp_register_style( 'bones-font-awesome', bones_theme_uri().'/library/fonts/font-awesome-4.7.0/css/font-awesome.min.css', array(), '' );

		// if ( strpos( get_page_template_slug(),'gmap') !== false  ) {
		// 	wp_enqueue_script( 'google-maps-api' );
		// }

		// comment reply script for threaded comments
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script( 'comment-reply' );
		}

		// load google fonts if you want ’em:
		wp_enqueue_style( 'bones-stylesheet' );
		wp_enqueue_style( 'bones-font-awesome' );
		wp_enqueue_style('bones-google-fonts', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Open+Sans:300,400,800');

		// enqueue:
		wp_enqueue_script( 'bones-bootstrap-js' );
		wp_enqueue_script( 'bones-slick' );
		wp_enqueue_script( 'bones-js' );

	}
}

// Theme Support
// Adding WP 3+ Functions & Theme Support
function bones_theme_support() {
	add_theme_support( 'post-thumbnails' ); // wp thumbnails (sizes handled in functions.php)
	set_post_thumbnail_size(256, 256, true); // default thumb size

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
		array(
			'default-image'          => '',    // background image default
			'default-color'          => '',    // background color default (dont add the #)
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);
	add_theme_support('automatic-feed-links'); // rss thingy
	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/
	add_theme_support( 'menus' ); // wp menus

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav'     => 'The Main Menu',   // main nav in header
			'footer-links' => 'Footer Links',
		)
	);
	add_theme_support( 'html5', array('comment-list','search-form','comment-form') ); // Enable support for HTML5 markup.
}

// Related Posts Function (call using bones_related_posts(); )
function bones_related_posts() {
	echo '<ul id="bones-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) {
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'bonestheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_postdata();
	echo '</ul>';
} /* end bones related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function bones_page_navi() {
	global $wp_query;
	$html = '';
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
		return;
	$html .= '<nav aria-label="Page navigation example">';
	$html .= paginate_links( array(
		'base'      => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
		'format'    => '',
		'current'   => max( 1, get_query_var('paged') ),
		'total'     => $wp_query->max_num_pages,
		'prev_text' => '&larr;',
		'next_text' => '&rarr;',
		'type'      => 'list',
		'end_size'  => 3,
		'mid_size'  => 3
	) );
	$html .= '</nav>';
	echo str_replace(array('page-numbers','<li>','<a class=\'pagination\'','<a class="next pagination"'),array('pagination','<li class="page-item">','<a class="page-link"','<a class="page-link"'),$html);
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bones_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function bones_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '" title="'. __( 'Read ', 'bonestheme' ) . esc_attr( get_the_title( $post->ID ) ).'">'. __( 'Read more &raquo;', 'bonestheme' ) .'</a>';
}

?>