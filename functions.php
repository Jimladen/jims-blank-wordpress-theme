<?php





/**
 * Register our sidebars and widgetized areas.
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


  function foundationpress_scripts() {
        
        // Enqueue the main Stylesheet.
        // wp_enqueue_style('main-stylesheet', get_stylesheet_directory_uri() . '/assets/stylesheets/foundation.css');
        
        // Deregister the jquery version bundled with WordPress.
        wp_deregister_script('jquery');
    
        // // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
        wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false );
    
        // wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/javascript/foundation.js', array('jquery'), '5.5.2', true );

        
        // // path to directory to scan
        // $theme_name = get_template();
        // $directory = "wp-content/themes/" . $theme_name . "/assets/javascript/vendor/";

        // $files = glob($directory . "*.js");

        // foreach ($files as $file) {
        	
        //     wp_enqueue_script( basename($file), get_template_directory() . '/assets/javascript/vendor/' . basename($file), array('jquery'), '', true );
        // }
    }
    
    add_action('wp_enqueue_scripts', 'foundationpress_scripts');

?>