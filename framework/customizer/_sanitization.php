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