<?php

/**
 * create a related pages widget
 * displays any child or sibling pages if applicable.
 */
class wp_related_pages_widget extends WP_Widget {

	// constructor
	function wp_related_pages_widget() {
		parent::WP_Widget(false, $name = __('Related Pages', 'wp_related_pages_widget') );
	}


	// widget form creation
	function form($instance) {

	// Check values
		if( $instance) {
			$title = esc_attr($instance['title']);
		} else {
			$title = '';
		}

?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
<small>Optional title appears above the menu</small>
</p>
<?php
}

	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['jssor_id'] = strip_tags($new_instance['jssor_id']);
		return $instance;
	}

	// widget display
	function widget($args, $instance) {
		$html = '';
		extract( $args );
		$related_pages_menu = related_pages_menu();
		if ($related_pages_menu) {
			// these are the widget options
			$title = apply_filters('widget_title', $instance['title']);
			$html .= $before_widget;
			// Display the widget
			$html .= '<div class="widget-related-pages-menu">';
			// Check if title is set
			if ( $title ) {
				$html .= $before_title . $title . $after_title;
			}
			$html .= $related_pages_menu;
			$html .= '</div>';
			$html .= $after_widget;
		}
		echo $html;
	}

}
// register widget:
add_action('widgets_init', create_function('', 'return register_widget("wp_related_pages_widget");'));

?>