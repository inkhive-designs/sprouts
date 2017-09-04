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
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'sprouts' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'sprouts' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( '%1$s WordPress Theme by %2$s.', 'sprouts' ), 'Sprouts', '<a href="https://www.inkhive.com/" rel="designer">InkHive</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	</div><!-- #footer-wrapper>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
