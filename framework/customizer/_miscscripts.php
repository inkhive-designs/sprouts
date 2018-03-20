<?php
function sprouts_customize_register_miscscripts($wp_customize) {
    $wp_customize->add_section(
        'sprouts_sec_pro',
        array(
            'title'     => __('Important Links','sprouts'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'sprouts_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Sprouts_WP_Customize_Upgrade_Control(
            $wp_customize,
            'sprouts_pro',
            array(
                'description'	=> '<a class="sprouts-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'sprouts').'</a>
                                    <a class="sprouts-important-links" href="https://inkhive.com/documentation/sprouts" target="_blank">'.__('Sprouts Documentation', 'sprouts').'</a>
                                    <a class="sprouts-important-links" href="https://demo.inkhive.com/sprouts-plus/" target="_blank">'.__('Sprouts Plus Live Demo', 'sprouts').'</a>
                                    <a class="sprouts-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'sprouts').'</a>
                                    <a class="sprouts-important-links" href="https://wordpress.org/support/theme/sprouts/reviews" target="_blank">'.__('Review Sprouts on WordPress', 'sprouts').'</a>',
                'section' => 'sprouts_sec_pro',
                'settings' => 'sprouts_pro',
            )
        )
    );
}
add_action('customize_register', 'sprouts_customize_register_miscscripts');