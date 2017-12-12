<div id="top-bar">
    <div class="container">

        <?php
        if (get_theme_mod('sprouts-social')) :
            get_template_part('modules/social/social');
        endif;
        ?>
        <div id = "search-top" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
                <div><input type="text" placeholder="Search..." size="18" value="" name="s" id="s" />
                </div>
            </form>
            <div id="search-icon">
                    <i class="fa fa-search"></i>
            </div>
        </div>
    </div>
</div>