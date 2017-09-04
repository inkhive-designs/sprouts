<?php
/*
** Customizer Controls
*/
if (class_exists('WP_Customize_Control')) {
    class Custom_CSS_Control extends WP_Customize_Control
    {
        public $type = 'textarea';

        public function render_content()
        {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="8"
                          style="width:100%;background: black; color: white;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }
    }
}

if (class_exists('WP_Customize_Control')) {
    class sprouts_Customize_Control extends WP_Customize_Control
    {
        public function render_content()
        {
            ?>
            <label>
                <input type="checkbox" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link();
                checked($this->value()); ?> />
                <?php echo esc_html($this->label); ?>
                <?php if (!empty($this->description)) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php endif; ?>
            </label>

            <script>
                jQuery(function ($) {
                    $('#customize-control-pro_hide').hide();
                    $('#accordion-section-klean_pro #accordion-section-title').css({"color": "#fff"});
                });
            </script>


            <?php
        }
    }
}