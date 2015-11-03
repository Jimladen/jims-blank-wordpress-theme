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
                <!-- Kept hard coded link just in case wiredep doesn't auto include foundation -->
                <!-- <link href="<?php // echo get_template_directory_uri();?>/bower_components/foundation/css/foundation.css" rel="stylesheet"> -->
                 <link href="<?php echo get_template_directory_uri();?>/css/global.css" rel="stylesheet">
                <!-- bower:css --><!-- endbower -->

                 <!-- bower:js --><!-- endbower -->
            </head>
            <header>
                <div class="wrap">
                    <div class="top-bar-container contain-to-grid">
                       <nav class="top-bar" data-topbar="" role="navigation">
                            <ul class="title-area top-bar-left">
                                <li class="name">
                                    <h1><a href="/"><?php echo get_bloginfo('name');?></a></h1>
                                </li>
                            </ul>
                            <section class="top-bar-section">
                                <div class="right">
                                    <?php wp_nav_menu(); ?>
                                </div>
                            </section>
                        </nav>
                    </div>
                </header>
                <body <?php body_class(); ?>>