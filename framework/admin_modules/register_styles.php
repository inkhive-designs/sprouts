<?php
/**
 * Enqueue scripts and styles.
 */
function sprouts_scripts() {
    wp_enqueue_style( 'sprouts-style', get_stylesheet_uri() );

    wp_enqueue_style('sprouts-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('sprouts_title_font', 'Lato') ).':100,300,400,700' );

    wp_enqueue_style('sprouts-bootstrap-style',get_template_directory_uri()."/assets/bootstrap/css/bootstrap.min.css", array('sprouts-style'));

    wp_enqueue_style( 'sprouts-main-skin', get_template_directory_uri() . '/assets/theme_styles/css/'.get_theme_mod('sprouts_skin', 'default').'.css', array(), null );

    wp_enqueue_style('sprouts-font-awesome',get_template_directory_uri()."/assets/font-awesome/css/font-awesome.css", array('sprouts-main-skin'));

    wp_enqueue_style('bx-slider-default-theme-skin', get_template_directory_uri(). "/assets/slider/jquery.bxslider.css", array('sprouts-font-awesome'));

    wp_enqueue_style('sprouts-nav', get_template_directory_uri(). "/assets/slicknav.css", array('bx-slider-default-theme-skin'));

    wp_enqueue_script('jquery');

    wp_enqueue_script( 'sprouts-slider-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), true );

    wp_enqueue_script( 'sprouts-custom', get_template_directory_uri() . '/js/custom.js', array(), true );

    wp_enqueue_script( 'sprouts-nav-js', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array(), true );

    wp_enqueue_script( 'sprouts-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'sprouts-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }


    wp_enqueue_style('sprouts-customizer-font-awesome',get_template_directory_uri()."/assets/font-awesome/css/font-awesome.css");

    wp_enqueue_style( 'sprouts-customizer-font-awesome' );

    wp_register_style( 'sprouts-customizer-css', get_template_directory_uri() . '/assets/css/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'sprouts-customizer-css' );
}
add_action( 'wp_enqueue_scripts', 'sprouts_scripts' );
