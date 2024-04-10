<?php
use Elementor\Utils;
if(!empty($settings['link']['url'])){
    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }
    if ( ! empty( $settings['link']['custom_attributes'] ) ) {
        // Custom URL attributes should come as a string of comma-delimited key|value pairs
        $custom_attributes = Utils::parse_custom_attributes( $settings['link']['custom_attributes'] );
        $widget->add_render_attribute( 'link', $custom_attributes);
    }

}
$link_attributes = $widget->get_render_attribute_string( 'link' );

$img_size = !empty($img_size) ? $img_size : 'full';
$thumbnail = '';
if( ! empty( $settings['selected_img']['id'] ) ){
    $img  = pxl_get_image_by_size( array(
        'attach_id'  => $settings['selected_img']['id'],
        'thumb_size' => $img_size,
    ) );
    $thumbnail = $img['thumbnail'];
}
?>

<div class="pxl-fancy-box layout-5">
    <div class="box-inner">
        <div class="box-content">
            <?php if(! empty( $settings['selected_icon']['value'] )): ?>
                <div class="icon-wrapper">
                    <div class="box-icon">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-fancy-icon pxl-icon' ], 'i' );?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($widget->get_setting('title'))): ?>
                <h3 class="box-title">
                    <?php if ( $link_attributes ) echo '<a '. implode( ' ', [ $link_attributes ] ).'>'; ?>
                    <?php pxl_print_html( nl2br($widget->get_setting('title'))); ?>
                    <?php if ( $link_attributes ) echo '</a>'; ?> 
                </h3>
            <?php endif; ?>
            <?php if(!empty($widget->get_setting('description'))): ?>
                <div class="box-description">
                    <?php pxl_print_html($widget->get_setting('description')); ?>
                </div>
            <?php endif; ?>
            <div class="box-image">
                <?php echo wp_kses_post($thumbnail); ?>
                <?php if ( $link_attributes ) echo '<a class="box-btn" '. implode( ' ', [ $link_attributes ] ).'>'; ?>
                    <i class="pxli pxli-arrow-right-solid"></i>
                <?php if ( $link_attributes ) echo '</a>'; ?> 
            </div>
        </div>
    </div>  
</div>