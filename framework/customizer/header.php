<?php
function sprouts_customize_register_header( $wp_customize ) {
    //Header Sections
    $wp_customize->add_panel(
        'sprouts_header_panel',
        array(
            'title'     => __('Header Settings','sprouts'),
            'priority'  => 30,
        )
    );

    $wp_customize->get_section('title_tagline')->panel = 'sprouts_header_panel';

    $wp_customize->add_section(
        'sprouts_header_options',
        array(
            'title'     => __('Header Image on Phones','sprouts'),
            'priority'  => 90,
            'panel' => 'sprouts_header_panel',
        )
    );

    $wp_customize->add_setting(
        'sprouts_header_image_style',
        array(
            'default'=> 'default',
            'sanitize_callback' => 'sprouts_sanitize_hil'
        )
    );

    $wp_customize->add_control(
        'sprouts_header_image_style',array(
            'label' => __('Choose Image Layout','sprouts'),
            'description' => __('By Default The Header Image Scales responsively on mobile phones and works as a background image. If you want your full header image to appear, choose full-image in the setting below. For More Control over header image, consider Plum Pro Version.	','sprouts'),
            'settings' => 'sprouts_header_image_style',
            'section'  => 'sprouts_header_options',
            'type' => 'select',
            'choices' => array(
                'default' => __('Default','sprouts'),
                'full-image' => __('Full Image','sprouts'),
            ),
        )
    );

    $wp_customize->get_section('header_image')->panel = 'sprouts_header_panel';

    function sprouts_sanitize_hil($input) {
        if ( in_array($input, array('default','full-image') ) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register','sprouts_customize_register_header');	