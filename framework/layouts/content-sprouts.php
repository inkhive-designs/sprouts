<?php
/**
 * @package Sprouts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sprouts col-md-12 col-sm-12'); ?>>
    <div class="featured-image">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="f-img">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sprouts-home-thumb'); ?></a>
            </div>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/images/dthumb.jpg'; ?>"></a>
        <?php endif; ?>

        <?php if (strlen(get_the_title()) >= 30) : ?>
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>" rel="bookmark">
                <?php echo substr(the_title(), 0, 29)."..."; ?>
        <?php else : ?>

            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>" rel="bookmark">
                    <?php the_title(); endif; ?>
                </a>
            </h1>

            <div class="posted-on">
                <div class="date"><?php echo get_the_time( 'M j, Y' ); ?></div>
                <div class="author"><?php echo get_the_author(); ?></div>
            </div>

        <div class="entry-header">
                <p class="post-excerpt">
                    <?php echo substr(get_the_excerpt(), 0, 330)."..."; ?>
                </p>
        </div>
    </div>
</article>