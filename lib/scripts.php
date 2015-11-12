<?php

  function jim_scripts() {
        
        // Enqueue the main Stylesheet.
        // wp_enqueue_style('main-stylesheet', get_stylesheet_directory_uri() . '/assets/stylesheets/foundation.css');
        
        // Deregister the jquery version bundled with WordPress.
        wp_deregister_script('jquery');
    
        // // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
        wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false );
    
        wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', array(), '', true );

        
        // // path to directory to scan
        // $theme_name = get_template();
        // $directory = "wp-content/themes/" . $theme_name . "/js";

        // $files = glob($directory . "*.js");

        // foreach ($files as $file) {
        // 	wp_register_script(basename($file), get_stylesheet_directory_uri() . '/js');
        //     wp_enqueue_script( basename($file), get_template_directory() . '/assets/javascript/vendor/' . basename($file), array('jquery'), '', true );
        // }

        // $directory = get_stylesheet_directory_uri() . '/js/';

        // $files = glob($directory . "*.js");

        // foreach ($files as $file) {
        //     wp_register_script('/' . basename($file), $directory . $file);
        //     wp_enqueue_script( '/' . basename($file), $directory . $file, array(), '', true );
        //     // echo $file;
        // }

    }
    
    add_action('wp_enqueue_scripts', 'jim_scripts');



    function jim_styles() {


        wp_enqueue_style('custom_style',get_template_directory_uri() . '/css/global.css');

        $mods = get_theme_mods();
        // var_dump($mods);

        $p_color = get_theme_mod('color_setting');

        $styles = '
        body { color:' . $p_color . ';} 
        body p { color: ' . $p_color . ';}
        body h1 { color:' . $mods['h1_color'] . ' } 
        body h2 { color:' . $mods['h2_color'] . ' } 
        body h3 { color:' . $mods['h3_color'] . ' }
        body h4 { color:' . $mods['h4_color'] . ' }
        body h5 { color:' . $mods['h5_color'] . ' }
        ';


       wp_add_inline_style('custom_style', $styles);
    }

    add_action('wp_enqueue_scripts', 'jim_styles');


    ?>