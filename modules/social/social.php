<?php
/**
 * The social icon template of the theme.
 *
 * @package sprouts
 */
?>


<div id="social-icons" class="col-lg-5 col-md-5 col-sm-12 col-xs-12">

	<?php 
	$s = array(
				"facebook",
				"twitter",
				"google-plus",
				"instagram",
				"youtube",
				"pinterest-p",
				"vimeo",
				"envelope"
			  );
			  
	$t = array(
				"Facebook",
				"Twitter",
				"Google Plus",
				"Instagram",
				"Youtube",
				"Pinterest",
				"Vimeo",
				"Mail"
			);
			  
	for($u = 0; $u < 8; $u++) {
		$v[$u] 	= "sprouts-" . $s[$u];
		if (get_theme_mod($v[$u])) {
	?>
		<a target="_blank" href="<?php echo esc_url( get_theme_mod($v[$u]) ); ?>" title="<?php echo ($t[$u]) ?>"><span class="fa-stack fa-lg"><i class="fa fa-<?php echo $s[$u] ?>"></i></span></a>
	<?php }
	}
	?>

</div>
