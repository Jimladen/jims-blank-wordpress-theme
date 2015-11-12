<?php
	/**
	* Template Name: test page
	*
	*/
get_header(); 

	  // // path to directory to scan
        $theme_name = get_template();
        $directory = "wp-content/themes/" . $theme_name . "/js";

        $directory = get_stylesheet_directory() . '/js/';

        $files = glob($directory . "*.js");

        foreach ($files as $file) {
        	wp_register_script(basename($file), $directory . $file);
        	// echo $file;
        }

        echo $directory;

        print_r( $files );



get_footer();