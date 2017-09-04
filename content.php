<?php
/**
 * @package sprouts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php sprouts_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php 
		if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sprouts-home-thumb'); ?></a>
	<?php else : 
		?>
		<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri() . '/images/dthumb.jpg'; ?>"></a>
	<?php endif;
		?>

	<footer class="entry-footer">
		<?php sprouts_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->