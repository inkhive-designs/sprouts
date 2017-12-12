<?php
/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
function sprouts_sanitize_text( $t ) {
    return wp_kses_post( force_balance_tags( $t ) );
}

function sprouts_sanitize_checkbox( $i ) {
    if ( $i == 1 ) {
        return 1;
    }
    else {
        return '';
    }
}

function sprouts_sanitize_positive_number( $input ) {
    if ( ($input >= 0) && is_numeric($input) )
        return $input;
    else
        return '';
}

function sprouts_sanitize_category( $input ) {
    if ( term_exists(get_cat_name( $input ), 'category') )
        return $input;
    else
        return '';
}

function sprouts_sanitize_product_category( $input ) {
    if ( get_term( $input, 'product_cat' ) )
        return $input;
    else
        return '';
}