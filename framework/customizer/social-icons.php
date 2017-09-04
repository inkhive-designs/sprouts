<?php

function sprouts_customize_register_social_icons($wp_customize){
    $wp_customize-> add_section(
        'sprouts-sec1',
        array(
            'title'			=> __('Social Settings','sprouts'),
            'description'	=> __('Manage the Social Icon Setings of your site.','sprouts'),
            'priority'		=> 70,
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
}
add_action('customize_register', 'sprouts_customize_register_social_icons');