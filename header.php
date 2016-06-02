<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
    <![endif]-->
    <!--[if IE 8]>
    <html class="ie ie8" <?php language_attributes(); ?>>
        <![endif]-->
        <!--[if !(IE 7) & !(IE 8)]><!-->
        <html <?php language_attributes(); ?>>
            <!--<![endif]-->
            <head>
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <meta charset="<?php bloginfo( 'charset' ); ?>">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="profile" href="http://gmpg.org/xfn/11">
                <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
                <!--[if lt IE 9]>
                <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
                <![endif]-->
                <!-- bower:css -->
                <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/build/bower_components/foundation/css/foundation.css" />
                <!-- endbower -->

                 <!-- bower:js -->
                 <script src="<?php echo get_template_directory_uri();?>/build/bower_components/modernizr/modernizr.js" type="text/javascript"></script>
                 <script src="<?php echo get_template_directory_uri();?>/build/bower_components/jquery/dist/jquery.js" type="text/javascript"></script>
                 <script src="<?php echo get_template_directory_uri();?>/build/bower_components/fastclick/lib/fastclick.js" type="text/javascript"></script>
                 <script src="<?php echo get_template_directory_uri();?>/build/bower_components/jquery.cookie/jquery.cookie.js" type="text/javascript"></script>
                 <script src="<?php echo get_template_directory_uri();?>/build/bower_components/jquery-placeholder/jquery.placeholder.js" type="text/javascript"></script>
                 <script src="<?php echo get_template_directory_uri();?>/build/bower_components/foundation/js/foundation.js" type="text/javascript"></script>
                 <!-- endbower -->

                <?php wp_head(); ?>

                <!-- Kept hard coded link just in case wiredep doesn't auto include foundation -->
                <!-- <link href="<?php // echo get_template_directory_uri();?>/bower_components/foundation/css/foundation.css" rel="stylesheet"> -->
                 
                

                <link href="<?php echo get_template_directory_uri();?>/css/global.css" rel="stylesheet">

               
                
            </head>


            <?php 

            $logo = get_theme_mod('logo_setting');

            ?>

            <header>
                <nav class="row medium-collapse">
                    <div class="medium-8 columns">
                        <?php wp_nav_menu(); ?>
                    </div>
                    <div class="medium-4 columns">
                        <div class="logo">
                           <img src="<?php print_r($logo); ?>">
                       </div>
                    </div>
                </nav>
            </header>
            <body <?php body_class(); ?>>