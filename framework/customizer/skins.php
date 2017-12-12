<?php
function sprouts_customize_register_skin($wp_customize){
    $wp_customize->get_section('colors')->title = __('Theme Skin & Colors','sprouts');
    $wp_customize->get_section('colors')->panel = 'sprouts_design_panel';

    $wp_customize->get_control('header_textcolor')->label = __('Site Title Color','sprouts');

    $wp_customize->add_setting('sprouts_header_desccolor', array(
        'default'     => '#3d3d3d',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'sprouts_header_desccolor', array(
            'label' => __('Site Tagline Color','sprouts'),
            'section' => 'colors',
            'settings' => 'sprouts_header_desccolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting(
        'sprouts_skin',
        array(
            'default'=> 'default',
            'sanitize_callback' => 'sprouts_sanitize_skin'
        )
    );

    $skins = array( 'default' => __('Default(Sprouts)','sprouts'),
        'green' => __('Green','sprouts'),
        'black' => __('Black', 'sprouts'),
        'orange' => __('Orange', 'sprouts'),
    );

    $wp_customize->add_control(
        'sprouts_skin',array(
            'settings' => 'sprouts_skin',
            'section'  => 'colors',
            'label' => __('Choose Skin','sprouts'),
            'description' => __('Free Version of sprouts Supports 3 Different Skin Colors.','sprouts'),
            'type' => 'select',
            'choices' => $skins,
        )
    );

    function sprouts_sanitize_skin( $input ) {
        if ( in_array($input, array('default','orange','green', 'black') ) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'sprouts_customize_register_skin');