<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

<?php if ( get_header_image() ) : ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
</a>
<?php endif; // End header image check. ?>

 *
 * @package sprouts
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses sprouts_header_style()
 * @uses sprouts_admin_header_style()
 * @uses sprouts_admin_header_image()
 */
function sprouts_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'sprouts_custom_header_args', array(
        'default-image'          => get_template_directory_uri() . '/assets/images/header.jpg',
        'default-text-color'     => '#000000',
        'width'                  => 1440,
        'flex-height'            => true,
        'wp-head-callback'       => 'sprouts_header_style',
        'admin-head-callback'    => 'sprouts_admin_header_style',
        'admin-preview-callback' => 'sprouts_admin_header_image',
    ) ) );
    register_default_headers( array(
            'default-image'    => array(
                'url'            => '%s/assets/images/header.jpg',
                'thumbnail_url'    => '%s/assets/images/header.jpg',
                'description'    => __('Default Header Image', 'sprouts')
            )
        )
    );
}
add_action( 'after_setup_theme', 'sprouts_custom_header_setup' );

if ( ! function_exists( 'sprouts_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog
     *
     * @see sprouts_custom_header_setup().
     */
    function sprouts_header_style() { ?>
        <style>
            #masthead {
                display: block;
                background-image: url(<?php header_image(); ?>);
                background-size: cover;
                background-position: center center;
                background-repeat: repeat;
            }
        </style> <?php
    }
endif; // sprouts_header_style

