<?php
$default_settings = [
	'anchors' => [],
];

$settings = array_merge($default_settings, $settings);
extract($settings);
?>

<?php if (isset($anchors) && !empty($anchors) && count($anchors)): ?>
<div class="pxl-anchor-list layout-1">
	<div class="pxl-anchor-list-wrap d-inline-flex relative">
		<?php foreach ($anchors as $key => $anchor): ?>
			<?php
			var_dump($anchor['template']);
			if (esc_attr($anchor['template']) == 'cart-url') {
				$target = 'pxl-0';
				$template = '0';
				$anchor_link = wc_get_cart_url();
			}
			else {
				$template = (int)$anchor['template'];
				$target = '.pxl-hidden-template-'.$template;
				$anchor_link = '#pxl-'.esc_attr($template);
			}
			
			if (esc_attr($anchor['template']) == 'cart-url')
				$anchor_cls = 'cart_anchor';
			else
				$anchor_cls = 'pxl-anchor side-panel';

			$widget->add_render_attribute('anchor'.$key, 'class', esc_attr($anchor_cls));

			if ($template > 0 ){
				if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
					add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'basilico_hook_anchor_hidden_panel' );
				}
			} else {
				add_action( 'pxltheme_anchor_target', 'basilico_hook_anchor_custom' );
			}
			?>
			<a href="<?php echo esc_attr($anchor_link); ?>" <?php pxl_print_html($widget->get_render_attribute_string( 'anchor'.$key )); ?> data-target="<?php echo esc_attr($target)?>">
				<?php
				echo '<div class="pxl-anchor-icon d-inline-flex align-items-center justify-content-center">';
				\Elementor\Icons_Manager::render_icon( $anchor['selected_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'span' );
				echo '</div>';
				?>
			</a>
		<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>