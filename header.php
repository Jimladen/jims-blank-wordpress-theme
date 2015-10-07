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
                <title><?php wp_title( '|', true, 'right' ); ?></title>
                <link rel="profile" href="http://gmpg.org/xfn/11">
                <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
                <!--[if lt IE 9]>
                <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
                <![endif]-->
                <?php wp_head(); ?>
                <!-- bower:css --><!-- endbower -->
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
                                    Menu Icon
                                </div>
                            </section>
                        </nav>
                    </div>
                </header>
                <body <?php body_class(); ?>>