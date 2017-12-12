<?php
/**
 * @package sprouts
 */
?>

<div class="article-wrapper">
    <article id="post-<?php the_ID(); ?>" <?php post_class('grid col-md-12 col-sm-12'); ?>>

        <div class="featured-thumb col-md-4 col-sm-4">
            <?php
            if ( has_post_thumbnail() ) { ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sprouts-grid-thumb'); ?></a>
            <?php }
            else { ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/images/dthumb.jpg'; ?>"></a>
            <?php } ?>
        </div><!--.featured-thumb-->

        <div class="out-thumb col-md-8 col-sm-8">
            <div class="entry-header">
                <h1 class="entry-title">
                    <a href="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>" rel="bookmark">
                        <?php the_title(); ?>
                    </a>
                </h1>
                <span class="entry-excerpt"><?php echo substr(get_the_excerpt(),0,200).(get_the_excerpt() ? "..." : "" ); ?></span>
                <span class="readmore"><a class="hvr-underline-from-center" href="<?php the_permalink() ?>"><?php _e('Read More','sprouts'); ?></a></span>
            </div><!-- .entry-header -->
        </div><!--.out-thumb-->

    </article>
</div>