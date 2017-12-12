<?php
/**
 * The template for displaying search results pages.
 *
 * @package sprouts
 */

get_header(); ?>

	<section id="primary" class="content-area col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'sprouts' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

                <?php
                /*
                 * Run the loop for the search to output the results.
                 */
                do_action('sprouts_blog_layout');

                ?>

			<?php endwhile; ?>

			<?php sprouts_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'modules/content/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
