<?php
$default_settings = [
    'items' => [],
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$arrows = $widget->get_setting('arrows','false');  
$dots = $widget->get_setting('dots','false');  

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show_xxl'            => $widget->get_setting('col_xxl', '3'),
    'slides_to_show'                => $widget->get_setting('col_xl', '3'),
    'slides_to_show_lg'             => $widget->get_setting('col_lg', '2'),
    'slides_to_show_md'             => $widget->get_setting('col_md', '2'),
    'slides_to_show_sm'             => $widget->get_setting('col_sm', '1'),
    'slides_to_show_xs'             => $widget->get_setting('col_xs', '1'), 
    'slides_to_scroll'              => $widget->get_setting('slides_to_scroll', '1'), 
    'slides_gutter'                 => 30,
    'arrow'                         => $arrows,
    'dots'                          => $dots,
    'dots_style'                    => 'bullets',
    'autoplay'                      => $widget->get_setting('autoplay', false),
    'pause_on_hover'                => $widget->get_setting('pause_on_hover', 'true'),
    'pause_on_interaction'          => 'true',
    'delay'                         => $widget->get_setting('autoplay_speed', '5000'),
    'loop'                          => $widget->get_setting('infinite','false'),
    'speed'                         => $widget->get_setting('speed', '500'),
    'centered_slides'               => true,
    'centered_slides_bounds'        => true,
];
  

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
$button_text = !empty($button_text) ? $button_text : esc_html__('Drag', 'basilico');
?>

<?php if(isset($items) && !empty($items) && count($items)): ?>
    <div class="pxl-swiper-slider pxl-carousel-landing layout-<?php echo esc_attr($settings['layout'])?>">
        <a id="circle-cursor" class="circle-cursor">
            <span><?php echo esc_html($button_text); ?></span>
        </a>
        <div class="pxl-swiper-slider-wrap pxl-carousel-inner add-custom-cursor relative">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper swiper-wrapper">
                    <?php foreach ($items as $key => $value):
                        $item_img       = isset($value['item_img']) ? $value['item_img'] : [];
                        $thumbnail1 = '';
                        if(!empty($item_img['id'])) {
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $item_img['id'],
                                'thumb_size' => 'full',
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail1 = $img['thumbnail'];
                        }
                        $link_type = $value['link_type'];
                        if(($link_type == 'url') && !empty( $value['link']['url'])){
                            $widget->add_render_attribute( 'text_link', 'href', $value['link']['url'] );
                            if ( $value['link']['is_external'] ) {
                                $widget->add_render_attribute( 'text_link', 'target', '_blank' );
                            }
                            if ( $value['link']['nofollow'] ) {
                                $widget->add_render_attribute( 'text_link', 'rel', 'nofollow' );
                            }
                            if ( ! empty( $value['link']['custom_attributes'] ) ) {
                                // Custom URL attributes should come as a string of comma-delimited key|value pairs
                                $custom_attributes = Utils::parse_custom_attributes( $value['link']['custom_attributes'] );
                                $widget->add_render_attribute( 'link', $custom_attributes);
                            }
                        }
                        if ($link_type == 'page') {
                            $page_url = get_permalink($value['page_link']);
                            $widget->add_render_attribute( 'text_link', 'href', $page_url );
                        }
                        ?>
                        <div class="pxl-swiper-slide swiper-slide">
                            <div class="item-inner relative">
                                <div class="item-image-wrap">
                                    <?php if(!empty($thumbnail1)) : ?>
                                        <div class="item-image">
                                            <a <?php pxl_print_html($widget->get_render_attribute_string( 'text_link' )); ?>>
                                            <?php echo wp_kses_post($thumbnail1);  ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><span class="pxl-icon pxli-arrow-next"></span></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><span class="pxl-icon pxli-arrow-prev"></span></div>
            <?php endif; ?>
            <?php if($dots !== 'false'): ?>
                <div class="pxl-swiper-dots"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
  