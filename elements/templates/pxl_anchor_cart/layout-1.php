<?php
$template = (int)$widget->get_setting('template','0');

$link_target = !empty($settings['link_target'] ) ? $settings['link_target'] : 'cart-dropdown';
$layout_type = $widget->get_setting('layout_type','layout-df');
$custom_cls = $widget->get_setting('custom_class','');

$wrap_cls = [
	'pxl-anchor-cart d-inline-flex align-items-center align-content-center relative',
	$link_target,
	$layout_type,
	$custom_cls
];
 
$cart_page = $link_target == 'cart-page' ? true : false;
$cart_page = (is_cart() || is_checkout()) ? true : $cart_page;

$target = '.pxl-cart-dropdown';

?>
<div class="<?php echo implode(' ', $wrap_cls) ?>">
	<?php if($cart_page): 
		$cart_page_url = wc_get_cart_url();
		?>
		<a class="cart-anchor" href="<?php echo esc_url($cart_page_url) ?>">
	<?php else: ?>
		<a class="pxl-anchor cart-anchor" href="#" data-target="<?php echo esc_attr($target) ?>">
	<?php endif; ?>
		<?php 
		if( $layout_type == 'layout-text'){
			echo '<span class="pxl-anchor-text d-inline-flex transition">'.$settings['text_title'].'</span>';
		}else{
			echo '<span class="pxl-anchor-icon d-inline-flex transition">';
		    	\Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'span' );
	    	echo '</span>';
	    }
		?>
		<?php if ( !\Elementor\Plugin::$instance->editor->is_edit_mode() ): ?>
			<?php if( $layout_type != 'layout-text'): ?>
				<span class="anchor-cart-total"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
				<span class="anchor-cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>
			<?php else: ?>
				(<span class="anchor-cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>)
			<?php endif; ?>
		<?php endif; ?>	
	</a>
	<?php if( $link_target == 'cart-dropdown' && !\Elementor\Plugin::$instance->editor->is_edit_mode()): ?>
		<div class="pxl-cart-dropdown">
			<div class="pxl-cart-dropdown-inner relative">
				<div class="cart-content-body widget_shopping_cart">
					<div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div>
				</div>
				<div class="cart-content-footer">
					<div class="cart-footer-wrap">
						<?php wc_get_template( 'cart/mini-cart-totals.php' ); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
