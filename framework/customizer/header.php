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


    $wp_customize->get_section('header_image')->panel = 'sprouts_header_panel';

    function sprouts_sanitize_hil($input) {
        if ( in_array($input, array('default','full-image') ) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register','sprouts_customize_register_header');	