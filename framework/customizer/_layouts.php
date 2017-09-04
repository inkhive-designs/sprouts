<?php
function sprouts_customize_register_design_layouts( $wp_customize ){
    // Layout and Design
    $wp_customize->add_panel( 'sprouts_design_layouts_panel', array(
        'priority'       => 60,
        'title'          => __('Design & Layout','sprouts'),
    ) );

    $wp_customize->add_section(
        'sprouts_design_options',
        array(
            'title'     => __('Blog Layout','sprouts'),
            'priority'  => 0,
            'panel'     => 'sprouts_design_layouts_panel'
        )
    );


    $wp_customize->add_setting(
        'sprouts_blog_layout',
        array( 'sanitize_callback' => 'sprouts_sanitize_blog_layout' )
    );

    function sprouts_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','sprouts') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'sprouts_blog_layout',array(
            'label' => __('Select Layout','sprouts'),
            'settings' => 'sprouts_blog_layout',
            'section'  => 'sprouts_design_options',
            'type' => 'select',
            'choices' => array(
                'sprouts' => __('Sprouts Theme Layout','sprouts'),
                'grid' => __('Basic Blog Layout','sprouts'),
                'grid_2_column' => __('Grid - 2 Column','sprouts'),

            )
        )
    );


    $wp_customize-> add_section(
        'sprouts_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','sprouts'),
            'description'	=> __('Enter your Own Copyright Text.','sprouts'),
            'priority'		=> 11,
            'panel'			=> 'sprouts_design_layouts_panel'
        )
    );

    $wp_customize->add_setting(
        'sprouts_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'sprouts_footer_text',
        array(
            'section' => 'sprouts_custom_footer',
            'settings' => 'sprouts_footer_text',
            'type' => 'text'
        )
    );
}
add_action('customize_register', 'sprouts_customize_register_design_layouts');