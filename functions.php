<?php
/**
 * sprouts functions and definitions
 *
 * @package sprouts
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'sprouts_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sprouts_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sprouts, use a find and replace
	 * to change 'sprouts' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sprouts', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sprouts' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'audio'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sprouts_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/**
	* Enable support for featured images.
	*/
	add_theme_support( 'post-thumbnails' ); 
	add_image_size('sprouts-home-thumb',800,600, true);

}
endif; // sprouts_setup
add_action( 'after_setup_theme', 'sprouts_setup' );


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

/**
 * Enqueue the stylesheet.
 */
function sprouts_customizer_stylesheet() {

	wp_enqueue_style('sprouts-customizer-font-awesome',get_template_directory_uri()."/assets/font-awesome/css/font-awesome.css");

	wp_enqueue_style( 'sprouts-customizer-font-awesome' );

    wp_register_style( 'sprouts-customizer-css', get_template_directory_uri() . '/assets/css/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'sprouts-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'sprouts_customizer_stylesheet' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sprouts_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'sprouts' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 1', 'sprouts' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 2', 'sprouts' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 3', 'sprouts' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 4', 'sprouts' ),
		'id'            => 'sidebar-5',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'sprouts_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sprouts_scripts() {
	wp_enqueue_style( 'sprouts-style', get_stylesheet_uri() );
	
	wp_enqueue_style('sprouts-bootstrap-style',get_template_directory_uri()."/assets/bootstrap/css/bootstrap.min.css", array('sprouts-style'));
	
	wp_enqueue_style('sprouts-main-skin',get_template_directory_uri()."/assets/css/main.css", array('sprouts-bootstrap-style'));
	
	wp_enqueue_style('sprouts-font-awesome',get_template_directory_uri()."/assets/font-awesome/css/font-awesome.css", array('sprouts-main-skin'));
	
	wp_enqueue_style('bx-slider-default-theme-skin', get_template_directory_uri(). "/assets/slider/jquery.bxslider.css", array('sprouts-font-awesome'));
	
	wp_enqueue_style('sprouts-nav', get_template_directory_uri(). "/assets/slicknav.css", array('bx-slider-default-theme-skin'));
	
	wp_enqueue_script('jquery');
	
	wp_enqueue_script( 'sprouts-slider-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), true );
	
	wp_enqueue_script( 'sprouts-custom', get_template_directory_uri() . '/js/custom.js', array(), true );
	
	wp_enqueue_script( 'sprouts-nav-js', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array(), true );

	wp_enqueue_script( 'sprouts-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'sprouts-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sprouts_scripts' );

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

/**
 *	All the custom CSS codes get loaded from here.
**/
function sprouts_custom_css() {
	$desc	=	esc_attr( get_theme_mod('header_textcolor', '#000000' ) );
	
	$css1	=	".site-description {
					color: $desc !important;	
				}";
				
	$desc2	=	esc_attr( get_theme_mod('sprouts-title-color', '#588b8b' ) );
	
	$css2	=	".site-title a {
					color: $desc2 !important;	
				}";
				
				
	wp_add_inline_style('sprouts-main-skin', $css1 . $css2 );
}

add_action('wp_enqueue_scripts','sprouts_custom_css');

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

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
