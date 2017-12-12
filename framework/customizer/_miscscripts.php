<?php
function sprouts_customize_register_miscscripts($wp_customize) {
    $wp_customize-> add_section(
        'sprouts-pro',
        array(
            'title'			=> __('About Sprouts','sprouts'),
            'description'	=> __('<a href="https://www.wordpress.org/themes/sprouts">Leave a Review</a><br><br><a href="https://www.inkhive.com/product/sprouts-plus">Check Out Sprouts Plus</a><br><br><a href="https://www.inkhive.com">More Themes</a>','sprouts'),
            'priority'		=> 1,
        )
    );



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
            'setting'	=> 'pro_hide',
            'priority'	=> 1,
        )
    ));
}
add_action('customize_register', 'sprouts_customize_register_miscscripts');