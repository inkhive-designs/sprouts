
<div id="slider-wrapper">
    <?php if (is_home() && get_theme_mod('sprouts-slide-enable')) { ?>
        <ul class="bxslider">
            <?php
            for($i = 1; $i <= 3; $i++) {
                $u = 'sprouts-url-'	. $i;
                $s = 'sprouts-slide_' . $i;
                $v = 'sprouts-title-' . $i;
                $d = 'sprouts-desc-' . $i;

                if (get_theme_mod($s) != '') {
                    ?>
                    <?php if ( get_theme_mod( $u ) != '' ) { ?>
                        <a href="<?php echo get_theme_mod( $u , ''); ?>">
                    <?php } ?>
                    <li>
                        <div class="slide"><div class="overlay"></div><img src = <?php echo esc_url( get_theme_mod($s) ); ?>>
                            <div class="slide_caption">
                                <?php if ( get_theme_mod( $v ) ) { ?>
                                    <h1 class="slide-title"><?php printf(get_theme_mod($v)); ?></h1><br>
                                <?php } ?>
                                <?php if ( get_theme_mod( $d ) ) { ?>
                                    <h2 class="slide-description"><?php printf(get_theme_mod($d)); ?></h2>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <?php if ( get_theme_mod( $u ) != '' ) { ?>
                        </a>
                    <?php } ?>
                <?php }
            } ?>
        </ul>
    <?php } ?>
</div>