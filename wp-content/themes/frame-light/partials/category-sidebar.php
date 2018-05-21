<?php	if (is_active_sidebar( 'fmr_left_menu_widget' )  && get_theme_mod('fmr_home_effects_sidebar','s2') == 's2') {	?>
	<div class="col-md-3 hidden-xs hidden-sm uni-ul">
	<?php 	dynamic_sidebar('fmr_left_menu_widget')	?>
	</div>
<?php } ?>