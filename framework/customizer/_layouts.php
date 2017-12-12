<?php
function sprouts_customize_register_design_layouts( $wp_customize ){
    $wp_customize->get_section('background_image')->panel = 'sprouts_design_panel';
    // Layout and Design
    $wp_customize->add_panel( 'sprouts_design_panel', array(
        'priority'       => 60,
        'title'          => __('Design & Layout','sprouts'),
    ) );

    $wp_customize->add_section(
        'sprouts_design_options',
        array(
            'title'     => __('Blog Layout','sprouts'),
            'priority'  => 0,
            'panel'     => 'sprouts_design_panel'
        )
    );


    $wp_customize->add_setting(
        'sprouts_blog_layout',
        array( 'sanitize_callback' => 'sprouts_sanitize_blog_layout' )
    );

    function sprouts_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','grid_3_column','sprouts',) ) )
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
                'grid_3_column' => __('Grid - 3 Column','sprouts'),

            )
        )
    );

    //Sidebar Layout
    $wp_customize->add_section(
        'sprouts_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','sprouts'),
            'priority'  => 0,
            'panel'     => 'sprouts_design_panel'
        )
    );

    $wp_customize->add_setting(
        'sprouts_disable_sidebar',
        array( 'sanitize_callback' => 'sprouts_sanitize_checkbox', 'default'  => true )
    );

    $wp_customize->add_control(
        'sprouts_disable_sidebar', array(
            'settings' => 'sprouts_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','sprouts' ),
            'section'  => 'sprouts_sidebar_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'sprouts_disable_sidebar_home',
        array( 'sanitize_callback' => 'sprouts_sanitize_checkbox', 'default'  => true )
    );

    $wp_customize->add_control(
        'sprouts_disable_sidebar_home', array(
            'settings' => 'sprouts_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','sprouts' ),
            'section'  => 'sprouts_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'sprouts_show_sidebar_options',
        )
    );

    $wp_customize->add_setting(
        'sprouts_disable_sidebar_front',
        array( 'sanitize_callback' => 'sprouts_sanitize_checkbox', 'default'  => true )
    );

    $wp_customize->add_control(
        'sprouts_disable_sidebar_front', array(
            'settings' => 'sprouts_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','sprouts' ),
            'section'  => 'sprouts_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'sprouts_show_sidebar_options',
        )
    );


    $wp_customize->add_setting(
        'sprouts_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'sprouts_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'sprouts_sidebar_width', array(
            'settings' => 'sprouts_sidebar_width',
            'label'    => __( 'Sidebar Width','sprouts' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','sprouts'),
            'section'  => 'sprouts_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'sprouts_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function sprouts_show_sidebar_options($control) {

        $option = $control->manager->get_setting('sprouts_disable_sidebar');
        return $option->value() == false ;

    }



    $wp_customize-> add_section(
        'sprouts_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','sprouts'),
            'description'	=> __('Enter your Own Copyright Text.','sprouts'),
            'priority'		=> 11,
            'panel'			=> 'sprouts_design_panel'
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