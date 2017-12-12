<?php

function sprouts_customize_register_social_icons($wp_customize){
    // Social Icons
    $wp_customize->add_section('sprouts_social_section', array(
        'title' => __('Social Icons','sprouts'),
        'priority' => 44,
        'panel' => 'sprouts_header_panel'
    ));

    $social_icon_styles = array(
        'default' => __('Default', 'sprouts'),
        'style1' => __('Style 1', 'sprouts'),
        'style2' => __('Style 2', 'sprouts'),
    );

    $wp_customize->add_setting('sprouts_social_icon_style', array(
        'default' => 'default',
        'sanitize_callback' => 'sprouts_sanitize_social_style'
    ) );

    function sprouts_sanitize_social_style($input) {
        $social_icon_styles = array(
            'default',
            'style1',
            'style2',
        );
        if ( in_array($input, $social_icon_styles))
            return $input;
        else
            return '';
    }

    $wp_customize->add_control('sprouts_social_icon_style', array(
            'setting' => 'sprouts_social_icon_style',
            'section' => 'sprouts_social_section',
            'label' => __('Social Icon Effects', 'sprouts'),
            'type' => 'select',
            'choices' => $social_icon_styles,
        )
    );

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-','sprouts'),
        'facebook' => __('Facebook','sprouts'),
        'twitter' => __('Twitter','sprouts'),
        'google-plus' => __('Google Plus','sprouts'),
        'instagram' => __('Instagram','sprouts'),
        'rss' => __('RSS Feeds','sprouts'),
        'vine' => __('Vine','sprouts'),
        'vimeo-square' => __('Vimeo','sprouts'),
        'youtube' => __('Youtube','sprouts'),
        'flickr' => __('Flickr','sprouts'),
    );

    $social_count = count($social_networks);

    for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

        $wp_customize->add_setting(
            'sprouts_social_'.$x, array(
            'sanitize_callback' => 'sprouts_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control( 'sprouts_social_'.$x, array(
            'settings' => 'sprouts_social_'.$x,
            'label' => __('Icon ','sprouts').$x,
            'section' => 'sprouts_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'sprouts_social_url'.$x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control( 'sprouts_social_url'.$x, array(
            'settings' => 'sprouts_social_url'.$x,
            'description' => __('Icon ','sprouts').$x.__(' Url','sprouts'),
            'section' => 'sprouts_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function sprouts_sanitize_social( $input ) {
        $social_networks = array(
            'none' ,
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'vine',
            'vimeo-square',
            'youtube',
            'flickr'
        );
        if ( in_array($input, $social_networks) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'sprouts_customize_register_social_icons');