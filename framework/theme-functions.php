<?php
/*
 * @package sprouts, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */

//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';


/*
** Function to check if Sidebar is enabled on Current Page 
*/

function sprouts_load_sidebar() {
    $load_sidebar = true;
    if ( get_theme_mod('sprouts_disable_sidebar', true) ) :
        $load_sidebar = false;
    elseif( get_theme_mod('sprouts_disable_sidebar_home',true) && is_home() )	:
        $load_sidebar = false;
    elseif( get_theme_mod('sprouts_disable_sidebar_front',true) && is_front_page() ) :
        $load_sidebar = false;
    endif;

    return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function sprouts_primary_class() {
    $sw = esc_html(get_theme_mod('sprouts_sidebar_width',4));
    $class = "col-md-".(12-$sw);

    if ( !sprouts_load_sidebar() )
        $class = "col-md-12";

    echo $class;
}
add_action('sprouts_primary-width', 'sprouts_primary_class');

function sprouts_secondary_class() {
    $sw = esc_html(get_theme_mod('sprouts_sidebar_width',4));
    $class = "col-md-".$sw;

    echo $class;
}
add_action('sprouts_secondary-width', 'sprouts_secondary_class');



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
            printf( '%1$s', get_comment_date() ); ?></a><?php edit_comment_link( __( '(Edit)','sprouts' ), '  ', '' );
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

/*
 * Pagination Function. Implements core paginate_links function.
 */
function sprouts_pagination() {
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array'
    ) );
    if( is_array($page_format) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination"><div><ul>';
        echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
        foreach ( $page_format as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul></div></div>';
    }
}


//Backwards Compatibility FUnction
function sprouts_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}

function sprouts_has_logo() {
    if (function_exists( 'has_custom_logo')) {
        if ( has_custom_logo() ) {
            return true;
        }
    } else {
        return false;
    }
}
