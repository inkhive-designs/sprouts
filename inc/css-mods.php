<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function sprouts_custom_css_mods() {



    echo "<style id='custom-css-mods'>";

    //If Title and Desc is set to Show Below the Logo
    if (  get_theme_mod('sprouts_branding_below_logo') ) :

        echo "#masthead #text-title-desc { display: block; clear: both; } ";

    endif;

    if ( get_header_textcolor() ) :
        echo "#masthead h1.site-title a { color: #".get_header_textcolor()."; }";
    endif;


    if ( get_theme_mod('sprouts_header_desccolor','#3d3d3d') ) :
        echo "#masthead h2.site-description { color: ".esc_html(get_theme_mod('sprouts_header_desccolor','#000'))."; }";
    endif;

    if ( get_theme_mod('sprouts_title_font','HIND') ) :
        echo "#masthead .site-branding h1, h2 { font-family: ".esc_html(get_theme_mod('sprouts_title_font'))."; }";
    endif;

    if ( get_theme_mod('sprouts_body_font','Open Sans') ) :
        echo "body { font-family: ".esc_html(get_theme_mod('sprouts_body_font'))."; }";
    endif;


    if ( get_theme_mod('sprouts_hide_title_tagline') ) :
        echo "#masthead .site-branding #text-title-desc { display: none; }";
    endif;

    echo "</style>";
}

add_action('wp_head', 'sprouts_custom_css_mods');