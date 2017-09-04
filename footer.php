<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sprouts
 */
?>

	</div><!-- #content -->
	<div id="footer-wrapper">
	<div id="footer-sidebar" class="widget-area clear container" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php 
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
		<div class="footer-column col-lg-3 col-md-3 col-sm-6 col-xs-12"> <?php
			dynamic_sidebar( 'sidebar-2'); 
		?> </div> <?php	
		}
			
		if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
		<div class="footer-column col-lg-3 col-md-3 col-sm-6 col-xs-12"> <?php
			dynamic_sidebar( 'sidebar-3'); 
		?> </div> <?php	
		}

		if ( is_active_sidebar( 'sidebar-4' ) ) { ?>
		<div class="footer-column col-lg-3 col-md-3 col-sm-6 col-xs-12"> <?php
			dynamic_sidebar( 'sidebar-4'); 
		?> </div> <?php	
		}
		
		if ( is_active_sidebar( 'sidebar-5' ) ) { ?>
		<div class="footer-column col-lg-3 col-md-3 col-sm-6 col-xs-12"> <?php
			dynamic_sidebar( 'sidebar-5'); 
		?> </div> <?php	
		}
		?>	 		
	</div><!-- #footer-sidebar -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="copyright">
                	<?php esc_attr_e( 'Copyright &copy;', 'sprouts' ); ?>  <?php bloginfo( 'name' ); ?>
        </div>

		<div class="site-info">
			<?php echo ( get_theme_mod('sprouts_footer_text') == '') ? ( '<a href="https://www.wordpress.org/" rel="designer">Proudly powered by WordPress</a><span class="sep"> | </span>' .  'Sprouts WordPress Theme by ' ). '<a href="https://www.inkhive.com/" rel="designer">InkHive</a>' : esc_html(get_theme_mod('sprouts_footer_text')); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	</div><!-- #footer-wrapper>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
