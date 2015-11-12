<?php
/**
*
* Sidebars
*
*/

/**
 * Register sidebars and widgetized areas.
 *
 */
function theme_register_widgets_init() {

	register_sidebar( array(
		'name' => 'Blank Sidebar',
		'id' => 'blank_sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_register_widgets_init' );

?>