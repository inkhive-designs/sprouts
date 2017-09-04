<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sprouts
 */
get_template_part('modules/header/head'); ?>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sprouts' ); ?></a>

    <?php get_template_part('modules/header/top', 'bar'); ?>
    <?php get_template_part('modules/header/masthead'); ?>
    <?php get_template_part('modules/navigation/main', 'menu'); ?>
    <?php get_template_part('framework/featured-components/slider'); ?>

	<div id="content" class="site-content container">
