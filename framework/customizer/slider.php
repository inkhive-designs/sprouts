<?php
function sprouts_customize_register_slider($wp_customize){
    $wp_customize-> add_panel(
        'sprouts-slider', array(
        'priority'       => 60,
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
}
add_action('customize_register', 'sprouts_customize_register_slider');