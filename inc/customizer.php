<?php
/**
 * sprouts Theme Customizer
 *
 * @package sprouts
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sprouts_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->default	= '#ffffff';
	$wp_customize->get_setting( 'header_textcolor' )->sanitize_callback	=	'sanitize_hex_color';
	$wp_customize->get_control( 'header_textcolor' )->label		= __('Site Description Color', 'sprouts');
	$wp_customize->remove_section('static_front_page');

	/*---- Color Settings ----*/
	
	$wp_customize-> add_setting(
		'sprouts-title-color',
		array(
			'default'	=> '588b8b',
			'sanitize_callback'	=> 'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'sprouts-title-color',
	        array(
	            'label' => __('Site Title Color','sprouts'),
	            'section' => 'colors',
	            'settings' => 'sprouts-title-color',
	            'priority'	=> 2,
	        )
	    )
	);
	
	$wp_customize-> add_section(
    'sprouts-sec1',
    array(
    	'title'			=> __('Social Settings','sprouts'),
    	'description'	=> __('Manage the Social Icon Setings of your site.','sprouts'),
    	'priority'		=> 3,
    	)
    );
    
    $wp_customize-> add_setting(
    'sprouts-social',
    array(
    	'default'			=> false,
    	'sanitize_callback'	=> 'sprouts_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'sprouts-social',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Enable Social Icons','sprouts'),
    	'section'	=> 'sprouts-sec1',
    	'priority'	=> 1,
    	)
    );

    $wp_customize-> add_setting(
    'sprouts-facebook',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'sprouts-facebook',
    array(
    	'label'		=> __('Facebook URL','sprouts'),
    	'section'	=> 'sprouts-sec1',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'sprouts-twitter',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'sprouts-twitter',
    array(
    	'label'		=> __('Twitter URL','sprouts'),
    	'section'	=> 'sprouts-sec1',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'sprouts-google-plus',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'sprouts-google-plus',
    array(
    	'label'		=> __('Google Plus URL','sprouts'),
    	'section'	=> 'sprouts-sec1',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'sprouts-instagram',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'sprouts-instagram',
    array(
    	'label'		=> __('Instagram URL','sprouts'),
    	'section'	=> 'sprouts-sec1',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'sprouts-pinterest-p',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'sprouts-pinterest-p',
    array(
    	'label'		=> __('Pinterest URL','sprouts'),
    	'section'	=> 'sprouts-sec1',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'sprouts-youtube',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'sprouts-youtube',
    array(
    	'label'		=> __('Youtube URL','sprouts'),
    	'section'	=> 'sprouts-sec1',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'sprouts-vimeo',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'sprouts-vimeo',
    array(
    	'label'		=> __('Vimeo URL','sprouts'),
    	'section'	=> 'sprouts-sec1',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'sprouts-envelope',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'sprouts-envelope',
    array(
    	'label'		=> __('Your E-Mail Info','sprouts'),
    	'section'	=> 'sprouts-sec1',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_panel(
    'sprouts-slider', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Slider Settings', 'sprouts'),
    'description'    => '',
    ));
    
    $wp_customize-> add_section(
    'sprouts-slides',
    array(
    	'title'			=> __('Enable Slider','sprouts'),
    	'priority'		=> 3,
    	'panel'			=> 'sprouts-slider',
    	)
    );
    
    $wp_customize-> add_setting(
    'sprouts-slide-enable',
    array(
    	'default'			=> false,
    	'sanitize_callback'	=> 'sprouts_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'sprouts-slide-enable',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Enable Slider','sprouts'),
    	'section'	=> 'sprouts-slides',
    	'priority'	=> 1,
    	)
    );
    
    $wp_customize-> add_section(
    'sprouts-slide-1', array(
    	'title'		=> __('Slide 1', 'sprouts'),
    	'panel'		=> 'sprouts-slider',
    	)
    );
    
    $wp_customize->add_setting( 
    'sprouts-slide_1', array(
    	'default'			=> '',
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'sprouts-slide_1',
	        array(
	            'label' => 'Slide Upload',
	            'section' => 'sprouts-slide-1',
	            'settings' => 'sprouts-slide_1',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'sprouts-title-1', array(
			'default'			=> '',
			'sanitize_callback'	=> 'sprouts_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'sprouts-title-1', array(
		'label'		=> __('Title','sprouts'),
		'section'	=> 'sprouts-slide-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'sprouts-desc-1', array(
			'default'			=> '',
			'sanitize_callback'	=> 'sprouts_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'sprouts-desc-1', array(
		'label'		=> __('Description','sprouts'),
		'section'	=> 'sprouts-slide-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'sprouts-url-1', array(
			'default'			=> '',
			'sanitize_callback'	=> 'esc_url',
			 )
	);
	
	$wp_customize-> add_control(
	'sprouts-url-1', array(
		'label'		=> __('URL','sprouts'),
		'section'	=> 'sprouts-slide-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_section(
    'sprouts-slide-2', array(
    	'title'		=> __('Slide 2', 'sprouts'),
    	'panel'		=> 'sprouts-slider',
    	)
    );
    
	$wp_customize->add_setting( 
    'sprouts-slide_2', array(
    	'default'			=> '',
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'sprouts-slide_2',
	        array(
	            'label' => 'Slide Upload',
	            'section' => 'sprouts-slide-2',
	            'settings' => 'sprouts-slide_2',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'sprouts-title-2', array(
			'default'			=> '',
			'sanitize_callback'	=> 'sprouts_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'sprouts-title-2', array(
		'label'		=> __('Title','sprouts'),
		'section'	=> 'sprouts-slide-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'sprouts-desc-2', array(
			'default'			=> '',
			'sanitize_callback'	=> 'sprouts_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'sprouts-desc-2', array(
		'label'		=> __('Description','sprouts'),
		'section'	=> 'sprouts-slide-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'sprouts-url-2', array(
			'default'			=> '',
			'sanitize_callback'	=> 'esc_url',
			 )
	);
	
	$wp_customize-> add_control(
	'sprouts-url-2', array(
		'label'		=> __('URL','sprouts'),
		'section'	=> 'sprouts-slide-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_section(
    'sprouts-slide-3', array(
    	'title'		=> __('Slide 3', 'sprouts'),
    	'panel'		=> 'sprouts-slider',
    	)
    );
    
	$wp_customize->add_setting( 
    'sprouts-slide_3', array(
    	'default'			=> '',
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'sprouts-slide_3',
	        array(
	            'label' => 'Slide Upload',
	            'section' => 'sprouts-slide-3',
	            'settings' => 'sprouts-slide_3',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'sprouts-title-3', array(
			'default'			=> '',
			'sanitize_callback'	=> 'sprouts_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'sprouts-title-3', array(
		'label'		=> __('Title','sprouts'),
		'section'	=> 'sprouts-slide-3',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'sprouts-desc-3', array(
			'default'			=> '',
			'sanitize_callback'	=> 'sprouts_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'sprouts-desc-3', array(
		'label'		=> __('Description','sprouts'),
		'section'	=> 'sprouts-slide-3',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'sprouts-url-3', array(
			'default'			=> '',
			'sanitize_callback'	=> 'esc_url',
			 )
	);
	
	$wp_customize-> add_control(
	'sprouts-url-3', array(
		'label'		=> __('URL','sprouts'),
		'section'	=> 'sprouts-slide-3',
		'type'		=> 'text',
		)
	);
	
	class Custom_CSS_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="8" style="width:100%;background: black; color: white;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}

	$wp_customize-> add_section(
    'sprouts-custom-css',
    array(
    	'title'			=> __('Custom CSS','sprouts'),
    	'description'	=> __('Add some custom CSS code to edit your theme.','sprouts'),
    	'priority'		=> 10,
    	)
    );
	$wp_customize->add_setting(
	'sprouts-css',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sprouts_sanitize_text'
		)
	);
 
	$wp_customize->add_control(
	    new Custom_CSS_Control(
	        $wp_customize,
	        'sprouts-css',
	        array(
	            'label' => 'CSS',
	            'section' => 'sprouts-custom-css',
	            'settings' => 'sprouts-css'
	        )
	    )
	);
	
	$wp_customize-> add_section(
    'sprouts-pro',
    array(
    	'title'			=> __('About Sprouts','sprouts'),
    	'description'	=> __('<a href="https://www.wordpress.org/themes/sprouts">Leave a Review</a><br><br><a href="https://www.inkhive.com/product/sprouts-plus">Check Out Sprouts Plus</a><br><br><a href="https://www.inkhive.com">More Themes</a>','sprouts'),
    	'priority'		=> 999,
    	)
    );
    
    class sprouts_Customize_Control extends WP_Customize_Control {    
	    public function render_content() {
	        ?>
	        <label>
						<input type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
						<?php echo esc_html( $this->label ); ?>
						<?php if ( ! empty( $this->description ) ) : ?>
							<span class="description customize-control-description"><?php echo $this->description; ?></span>
						<?php endif; ?>
					</label>
					
					<script>
					jQuery(function($){
						$( '#customize-control-pro_hide' ).hide();
						$( '#accordion-section-klean_pro #accordion-section-title' ).css({"color":"#fff"});						
					});
					</script>

					
	        <?php
	    }
	}
    
    $wp_customize->add_setting(
	'pro_hide',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'sprouts_sanitize_checkbox',
		)
	);
 
	$wp_customize-> add_control( new sprouts_Customize_Control( $wp_customize,
    'pro_hide',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Hide this section forever.','sprouts'),
    	'section'	=> 'sprouts-pro',
    	'priority'	=> 1,
    	)
    ));
	
	function sprouts_sanitize_text( $t ) {
    return wp_kses_post( force_balance_tags( $t ) );
    }
    
    function sprouts_sanitize_checkbox( $i ) {
	    if ( $i == 1 ) {
	        return 1;
	    } 
	    else {
	        return '';
	    }
	}
}
add_action( 'customize_register', 'sprouts_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sprouts_customize_preview_js() {
	wp_enqueue_script( 'sprouts_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'sprouts_customize_preview_js' );
