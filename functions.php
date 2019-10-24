<?php
// Load Bones Core
require_once( dirname(__FILE__) . '/library/bones.php' );
// Customize the Wordpress Admin
require_once( dirname(__FILE__) . '/library/admin.php' );
// Etc
require_once( dirname(__FILE__) . '/library/inc/nav_menu_bootstrap.php' );
require_once( dirname(__FILE__) . '/library/inc/wp_related_pages_widget.inc.php' );

// Launch Bones
// Let's get everything up and running.
function bones_ahoy() {
	add_editor_style( bones_theme_uri() . '/library/css/editor-style.css' ); // allow editor styles
	add_action( 'init', 'bones_head_cleanup' ); // launching operation cleanup
	add_filter( 'the_generator', 'bones_rss_version' ); // remove WP version from RSS
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 ); // remove pesky injected css for recent comments widget
	add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 ); // clean up comment styles in the head
	add_filter( 'gallery_style', 'bones_gallery_style' ); // clean up gallery output in wp
	add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 ); // enqueue base scripts and styles
	bones_theme_support(); // launching this stuff after theme setup
	add_action( 'widgets_init', 'bones_register_sidebars' ); // adding sidebars to Wordpress (these are created in functions.php)
	add_filter( 'the_content', 'bones_filter_ptags_on_images' ); // cleaning up random code around images
	add_filter( 'excerpt_more', 'bones_excerpt_more' ); // cleaning up excerpt
} 
add_action( 'after_setup_theme', 'bones_ahoy' ); // let's get this party started



/************* OEMBED SIZE OPTIONS *************/
if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// for widescreen-formatted images:
add_image_size( 'hd-thumb',                 240,   135,   true );
add_image_size( 'hd-640',                   640,   360,   true );
add_image_size( 'hd-1280',                  1280,  720,   true );
add_image_size( 'hd-2560',                  2560,  1440,  true );
add_image_size( 'mmbthumb',                  600,  375,  true );

// better thumbnails — any width, constant height, never cropped:
// add_image_size( 'small-hrz-icon',           9999,   100,  false );
// add_image_size( 'page-header',              1280,  480,  true );

// For inline-images that need a consistent height (or “figrues” as the client calls them):
//add_image_size( 'figure-small',             9999,  150,  false );
//add_image_size( 'figure-medium',            9999,  300,  false );
//add_image_size( 'figure-large',             9999,  600,  false );

/**
 * This function is a faster replacement of these 2 because it does not make any database calls.
 *  - get_stylesheet_directory_uri()
 *  - get_template_directory_uri()
 */
function bones_theme_uri(){
	$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}";
	$matches = array();
	preg_match('/(\/wp-content.*)/', dirname(realpath(__FILE__)), $matches);
	return $matches ? $host.$matches[1] : '/wp-content/themes/normandesign';
}


// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id'            => 'sidebar1',
		'name'          => 'Sidebar 1',
		'description'   => 'The first (primary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'id'            => 'footer1',
		'name'          => 'Footer 1',
		'description'   => 'Footer (1st col.)',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'id'            => 'footer2',
		'name'          => 'Footer 2',
		'description'   => 'Footer (2nd col.)',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'id'            => 'footer3',
		'name'          => 'Footer 3',
		'description'   => 'Footer (3rd col.)',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'id'            => 'footer4',
		'name'          => 'Footer 4',
		'description'   => 'Footer (4th col.)',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'id'            => 'footer_byline',
		'name'          => 'Footer Byline',
		'description'   => 'Footer Byline',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<!-- ',
		'after_title'   => ' -->',
	));
}


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
	 $GLOBALS['comment'] = $comment; ?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
		<article	class="cf">
			<header class="comment-author vcard">
<?php
/*
  this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
  echo get_avatar($comment,$size='32',$default='<path_to_url>' );
*/
?>
<?php // custom gravatar call ?>

<?php
  // create variable
  $bgauthemail = get_comment_author_email();
?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo bones_theme_uri(); ?>/library/img/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'	 ','') ) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content cf">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


function replace_howdy( $wp_admin_bar ) {
	$my_account=$wp_admin_bar->get_node('my-account');
	$newtitle = str_replace( 'Howdy,', '&#9776;', $my_account->title );
	$wp_admin_bar->add_node( array(
		'id' => 'my-account',
		'title' => $newtitle,
	) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );


function slugify($text) { 
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	$text = trim($text, '-');
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	$text = strtolower($text);
	$text = preg_replace('~[^-\w]+~', '', $text);
	if (empty($text)) {return 'n-a';}
	return $text;
}

function miniml_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('search');
	$wp_admin_bar->remove_menu('themes');
	//$wp_admin_bar->remove_menu('menus');
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('new-content');
	//$wp_admin_bar->remove_menu('wpseo-menu');
	$wp_admin_bar->remove_menu('customize');
}
add_action( 'wp_before_admin_bar_render', 'miniml_admin_bar' ); 


/** the archive pages & taxonomy pages for custom posts should get unlimited posts **/
/*
function bones_custom_posts_per_page($query) {
	if ($query->is_main_query() && $query->is_tax()) {
		$query->query_vars['posts_per_page'] = -1; //display all is -1
	}
	switch ( $query->query_vars['post_type'] ) {
		case 'product':  // Post Type named 'product'
			$query->query_vars['posts_per_page'] = -1; //display all is -1
			break;
	}
	return $query;
}
if( !is_admin() ) {
	add_filter( 'pre_get_posts', 'bones_custom_posts_per_page' );
}
*/



//	/** bones theme settings **/
//	add_action( 'admin_menu', 'bonestheme_options_add_admin_menu' );
//	add_action( 'admin_init', 'bonestheme_options_settings_init' );
//	
//	function bonestheme_options_add_admin_menu() { 
//		add_options_page( 'Theme Options', 'Theme Options', 'manage_options', 'theme_options', 'bonestheme_options_options_page' );
//	}
//	
//	function bonestheme_options_settings_init() { 
//		register_setting( 'pluginPage', 'bonestheme_options_settings' );
//	
//		add_settings_section(
//			'bonestheme_options_pluginPage_section', 
//			__( 'Header &amp; Footer', 'bonestheme' ), 
//			'bonestheme_options_settings_section_callback', 
//			'pluginPage'
//		);
//	
//		// editable_header_region_1
//		add_settings_field( 
//			'editable_header_region_1',
//			'Header Secondary Text', 
//			'editable_header_region_1_render', 
//			'pluginPage', 
//			'bonestheme_options_pluginPage_section' 
//		);
//	
//		// editable_footer_region_1
//		add_settings_field( 
//			'editable_footer_region_1',
//			'Footer Attribution Text', 
//			'editable_footer_region_1_render', 
//			'pluginPage', 
//			'bonestheme_options_pluginPage_section' 
//		);
//	
//	}
//	
//	
//	
//	
//	function editable_footer_region_1_render(  ) { 
//		$options = get_option( 'bonestheme_options_settings' );
//		echo '<textarea cols="60" rows="12" class="code-format" name="bonestheme_options_settings[editable_footer_region_1]">'.$options['editable_footer_region_1'].'</textarea>' . "\n";
//	}
//	
//	function editable_header_region_1_render(  ) { 
//		$options = get_option( 'bonestheme_options_settings' );
//		echo '<textarea cols="60" rows="12" class="code-format" name="bonestheme_options_settings[editable_header_region_1]">'.$options['editable_header_region_1'].'</textarea>' . "\n";
//	}
//	
//	
//	
//	function bonestheme_options_settings_section_callback(  ) { 
//		echo __( 'Customizable HTML content for the main header &amp; footer.', 'bonestheme' );
//	}
//	
//	
//	function bonestheme_options_options_page(  ) { 
//		echo "<form action='options.php' method='post'> \n";
//		echo "<h2>Theme Options</h2> \n";
//		settings_fields( 'pluginPage' );
//		do_settings_sections( 'pluginPage' );
//		submit_button();
//		echo "</form> \n";
//	}
//	/** /bones theme settings **/



//	function bones_make_mce_awesome($in) {
//	    $in['block_formats'] = 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4';
//	    $in['toolbar1']='formatselect,|,bold,italic,link,unlink,|,bullist,numlist,outdent,indent,|,blockquote,hr,|,removeformat,pastetext,|,undo,redo';
//	    $in['toolbar2']='';
//	/*
//	    $in['toolbar3']='';
//	    $in['toolbar4']='';
//	*/
//	    return $in;
//	}
//	//add_filter('tiny_mce_before_init', 'bones_make_mce_awesome');



//	function bones_simple_breadcrumbs($crumbs=array()){
//		global $post;
//		$html = '';
//		if ($crumbs) {
//			$n = 1;
//			$html = '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
//			foreach ($crumbs as $crumb_name => $crumb_url) { 
//				$html .= '<span property="itemListElement" typeof="ListItem">';
//				$html .= $n < count($crumbs) ? '<a property="item" typeof="WebPage" title="Go to '.$crumb_name.'." href="'.$crumb_url.'" class="">' : '';
//				$html .= '<span property="name">'.$crumb_name.'</span>';
//				$html .= $n < count($crumbs) ? '</a>' : '';
//				$html .= '<meta property="position" content="'. $n .'">';
//				$html .= '</span>';
//				$html .= $n < count($crumbs) ? ' &gt; ' : '';
//				$n++;
//			} 
//			$html .= '</div>';
//		}
//		return $html;
//	}


function bones_thumbnail($params=array()){
	global $post;
	$html = '';
	$defaults = array(
		'classes' => '',
		'size'    => 'medium',
	);
	$args = wp_parse_args( $params, $defaults );
	if ( has_post_thumbnail() ) {
		$classes = 'wp-post-image wp-post-thumbnail';
		$classes .= $args['classes'] ? ' ' . $args['classes'] : '';
	//$image = get_the_post_thumbnail( $post_id, array(180,180), array( 'class' => 'alignleft' ) );
	//echo '<a href="' . get_the_permalink() . '" rel="bookmark" title="' . esc_attr(get_the_title()) . '">' . $image . '</a>';
		$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $args['size'] );
		$img_url = array_key_exists(0,$img) ? $img[0] : false;
		$html .= $img_url ? '<a href="' . get_the_permalink() . '" rel="bookmark" title="' . esc_attr(get_the_title()) . '"><img src="' . $img_url . '" class="'.$classes.'" alt="' . esc_attr(get_the_title()) . '"></a>' : '';
	}
	return $html;
}



/**
 * automatically generate a menu of subpages, or sibling pages
 * the site editor can set up nested groups of pages and not worry about navigation
 */
function has_children() {
	global $post;
	$children = get_pages('child_of='.$post->ID);
	if ( count( $children ) != 0 ) { 
		return true;
	} else {
		return false;
	}
}
function related_pages_menu() { 
	global $post;
	$html = '';
		$params = array(
			'link_before'      => '',
			'link_after'       => '',
			'depth'            => 1,
			'sort_order'       => 'ASC',
			'sort_column'      => 'menu_order',
			'post_type'        => 'page',
			'title_li'         => '', 
			'echo'             => false
		);
		$classes = 'related-pages';
		if (has_children()) { 
			$classes .= ' sub-pages';
			$params['child_of'] = $post->ID; // list child pages 
		} else if ($post->post_parent != 0) {
			$classes .= ' sibling-pages';
			$params['child_of'] = $post->post_parent; // list sibling pages (for pages not at the root level)
		} else {
			return false; // root level page with no children. return nothing.
		}
		$html .= '<nav class="'.$classes.'"><ul>';
		$html .= wp_list_pages($params);
		$html .= '</ul></nav>';
		return $html;
} // end related_pages_menu 

// Remove anything that looks like an archive title prefix (like “Archive:”, “Category:” “Foo:”, “Bar:”…)
add_filter('get_the_archive_title', function ($title) {
	return preg_replace('/^\w+: /', '', $title);
});

?>