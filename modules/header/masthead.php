<header id="masthead" class="site-header" role="banner">
    <div class="site-branding">
        <?php if ( sprouts_has_logo() ) : ?>
        <div id="site-logo">
            <?php sprouts_logo(); ?>
        </div>
        <?php endif; ?>
        <div id="text-title-desc">
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        </div>
    </div><!-- .site-branding -->
    <div id="header-image"></div>

</header><!-- #masthead -->