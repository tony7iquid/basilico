<?php if(class_exists('MC4WP_Container')) : ?>
	<div class="pxl-mailchimp d-flex layout-1 <?php echo esc_attr($settings['style']); ?><?php echo esc_attr($settings['hide_icon']) == "true" ? ' hide-icon' : ''; ?><?php echo esc_attr($settings['hide_button_text']) == "true" ? ' hide-button-text' : ''; ?><?php echo esc_attr($settings['hide_cblb']) == "true" ? ' hide-cblb' : ''; ?>">
		<div class="col">
		<?php echo do_shortcode('[mc4wp_form]'); ?>
		</div>
	</div>
<?php endif; ?>
