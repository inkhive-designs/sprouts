<?php
/*
 * @package sprouts, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */

//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';


function sprouts_fonts_url() {
    $fonts_url = '';

    $open_sans = _x('on', 'Open Sans font: on or off', 'sprouts');

    if ( 'off' !== $open_sans) {
        $font_families = array();

        if ('off' !== $open_sans ) {
            $font_families[] = 'Open Sans:300,400,700,800';
        }
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
    }

    $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}

add_action( 'after_setup_theme', 'sprouts_fonts_url' );



function sprouts_initialize_header() {

    echo "<script>"; ?>

    jQuery(document).ready(function(){
    jQuery('.bxslider').bxSlider({
    auto: false,
    mode: 'fade',
    adaptiveHeight: true,
    captions: true
    });
    });

    jQuery(function(){
    jQuery('.menu').slicknav({
    prependTo: '#default-nav'
    });
    });

    <?php

    echo "</script>";

    echo "<style>";

    echo get_theme_mod('sprouts-css');

    echo "</style>";

}

add_action('wp_head', 'sprouts_initialize_header');

/*
** Function to Get Theme Layout
*/
function sprouts_get_blog_layout(){
    $ldir = 'framework/layouts/content';
    if (get_theme_mod('sprouts_blog_layout') ) :
        get_template_part( $ldir , get_theme_mod('sprouts_blog_layout') );
    else :
        get_template_part( $ldir ,'sprouts');
    endif;
}
add_action('sprouts_blog_layout', 'sprouts_get_blog_layout');



function sprouts_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <?php printf( __( '<cite class="fn">%s</cite>', 'sprouts' ), get_comment_author_link() ); ?>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','sprouts' ); ?></em>
        <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo esc_html( get_comment_link( $comment->comment_ID ) ); ?>">
            <?php
            /* translators: 1: date, 2: time */
            printf( __('%1$s','sprouts'), get_comment_date() ); ?></a><?php edit_comment_link( __( '(Edit)','sprouts' ), '  ', '' );
        ?>
    </div>

    <div class="entry-content">
        <?php comment_text(); ?>
    </div>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
        </div>
    <?php endif; ?>
    <?php
}
