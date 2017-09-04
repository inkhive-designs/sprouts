<?php
/**
 * @package sprouts
 */
?>

<div class="article-wrapper">
    <article id="post-<?php the_ID(); ?>" <?php post_class('homepage-article'); ?>>

        <div class="featured-image">
            <?php
            if ( has_post_thumbnail() ) { ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sprouts-home-thumb'); ?></a>
            <?php }
            else { ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/images/dthumb.jpg'; ?>"></a>
            <?php } ?>

            <div class="entry-header">

                <?php if (strlen(get_the_title()) >= 30) { ?>
                <h1 class="entry-title"><a href="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>" rel="bookmark">
                        <?php
                        echo substr(the_title(), 0, 29)."...";
                        } else {
                        ?>
                        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>" rel="bookmark">
                                <?php
                                the_title(); } ?></a></h1>
                        <h2 class="post-excerpt">
                            <?php
                            if (has_excerpt()) {
                                the_excerpt();
                            }
                            ?>
                        </h2>
            </div>
        </div>
    </article>
</div>