<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><html class="no-js"><![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title( ' | ' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php if ( optionsframework_get_option('favicon') != '' ): ?>
    <link rel="shortcut icon" href="<?php echo optionsframework_get_option( 'favicon' ); ?>">
    <link rel="icon" href="<?php echo optionsframework_get_option( 'favicon' ); ?>">
    <?php endif; ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/static/js/html5.js" type="text/javascript"></script>
    <![endif]-->
	<?php wp_head(); ?>
    <?php if ( optionsframework_get_option( 'custom_css' ) != '' ): ?>
    <style type="text/css">
    <?php echo optionsframework_get_option( 'custom_css' ); ?>
    </style>
    <?php endif; ?>
</head>
<body <?php body_class(); ?>>
	<header id="masthead" class="navbar navbar-inverse">
    	<div class="navbar-inner">
        	<div class="container">
            	<div class="brand">
                <?php if ( optionsframework_get_option('custom_logo') != '' ): ?>
                	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo optionsframework_get_option( 'custom_logo' ); ?>" /></a>
                <?php else : ?>
                	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                    <?php bloginfo( 'description' ); ?>
                <?php endif; ?>
                </div>
                <?php if ( has_nav_menu( 'header-menu' ) ) : ?>
                <?php wp_nav_menu( array('menu_class' => 'nav', 'container_class' => 'nav' ) ); ?>
                <?php endif; ?>
                <div class="widgets pull-right">
                <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                	<?php dynamic_sidebar( 'sidebar-2' ); ?>
                <?php endif;?>
                </div>
            </div>
        </div>
    </header> 