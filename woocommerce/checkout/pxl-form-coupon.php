<?php

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) {
	return;
}

?>
  
<form class="checkout_coupon woocommerce-form-coupon" method="post">
 
	<div class="form-coupon-inner relative"> 
		<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Enter promo code', 'basilico' ); ?>" id="coupon_code" value="" />
		<span class="pxl-icon lnil lnil-offer"></span>
		<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'basilico' ); ?>"><?php esc_html_e( 'Apply', 'basilico' ); ?></button>
	</div>
 
</form>