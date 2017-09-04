<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sprouts
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sprouts' ); ?></a>
	
	<div id="top-bar">
		<div class="container">
	
			<?php 
				if (get_theme_mod('sprouts-social')) :
				get_template_part('social');
				endif;
			?>	
			<div id = "search-top" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
				<div><input type="text" placeholder="Search..." size="18" value="" name="s" id="s" />
				</div>
			</form>
			<div id="search-icon"><i class="fa fa-search"></i></div>
		</div>
		</div>
	</div>
	
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->
		<div id="header-image"></div>

	</header><!-- #masthead -->
		<div id="default-nav">
		<nav id="site-navigation" class="main-navigation" role="navigation">
		
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'sprouts' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		
		</nav><!-- #site-navigation -->
		</div>
	
	<div id="slider-wrapper" class="container">
	<?php if (is_home() && get_theme_mod('sprouts-slide-enable')) { ?>
	<ul class="bxslider">
		<?php 
		for($i = 1; $i <= 3; $i++) { 
			$u = 'sprouts-url-'	. $i;
			$s = 'sprouts-slide_' . $i;
			$v = 'sprouts-title-' . $i;
			$d = 'sprouts-desc-' . $i;
			
			if (get_theme_mod($s) != '') {
		?>	
		<?php if ( get_theme_mod( $u ) != '' ) { ?>
			<a href="<?php get_theme_mod( $u , ''); ?>">
		<?php } ?>
				<li>
						<div class="slide"><div class="overlay"></div><img src = <?php echo esc_url( get_theme_mod($s) ); ?>>
							<div class="slide_caption">
								<?php if ( get_theme_mod( $v ) ) { ?>
								<h1 class="slide-title"><?php printf(get_theme_mod($v)); ?></h1><br>
								<?php } ?>
								<?php if ( get_theme_mod( $d ) ) { ?>
								<h2 class="slide-description"><?php printf(get_theme_mod($d)); ?></h2>
								<?php } ?>
							</div>
						</div>
					</li>
			<?php if ( get_theme_mod( $u ) != '' ) { ?>
			</a>
			<?php } ?>
		<?php } 
			} ?>
	</ul>
	<?php } ?>	</div>


	<div id="content" class="site-content container">
