<?php
function sprouts_customize_register_custom_css($wp_customize) {
    $wp_customize-> add_section(
        'sprouts-custom-css',
        array(
            'title'			=> __('Custom CSS','sprouts'),
            'description'	=> __('Add some custom CSS code to edit your theme.','sprouts'),
            'priority'		=> 40,
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
                'settings' => 'sprouts-css',
            )
        )
    );
}
add_action('customize_register', 'sprouts_customize_register_custom_css');