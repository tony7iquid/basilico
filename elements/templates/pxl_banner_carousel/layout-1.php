<?php
use Elementor\Utils;
$default_settings = [
    'banners' => [],
];
   
$settings = array_merge($default_settings, $settings);
extract($settings);

$arrows = $widget->get_setting('arrows','false');
$nav = $widget->get_setting('nav','false');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show_xxl'            => $widget->get_setting('col_xxl', '1'),
    'slides_to_show'                => $widget->get_setting('col_xl', '1'),
    'slides_to_show_lg'             => $widget->get_setting('col_lg', '1'),
    'slides_to_show_md'             => $widget->get_setting('col_md', '1'),
    'slides_to_show_sm'             => $widget->get_setting('col_sm', '1'),
    'slides_to_show_xs'             => $widget->get_setting('col_xs', '1'), 
    'slides_to_scroll'              => $widget->get_setting('slides_to_scroll', '1'), 
    'slides_gutter'                 => 0,
    'arrow'                         => $arrows,
    'nav'                           => $nav,
    'loop'                          => $widget->get_setting('infinite','false'),
    'speed'                         => $widget->get_setting('speed', '500')
];
  

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container overflow-hidden',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
?>
<?php if(isset($banners) && !empty($banners) && count($banners)): ?>
    <div class="pxl-swiper-slider pxl-banner-carousel layout-<?php echo esc_attr($settings['layout'])?>">
        <?php if($nav !== 'false'): ?>
            <div class="pxl-swiper-thumbs-wrap">
                <div class="pxl-swiper-thumbs overflow-hidden" data-item="5">
                    <div class="pxl-thumbs-wrapper swiper-wrapper ">
                        <?php foreach ($banners as $index => $item):
                            $nav_text = "";
                            if (!empty($item['nav_text'])){
                                $nav_text = $item['nav_text'];
                            }
                            ?>
                            <div class="thumb-item swiper-slide">
                                <span><?php echo esc_html($nav_text); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="pxl-swiper-slider-wrap pxl-carousel-inner relative">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper swiper-wrapper">
                <?php foreach ($banners as $index => $item):
                    // Link Repeater Key
                    $link_key = $widget->get_repeater_setting_key( 'link', 'banners', $index );
                    if ( ! empty( $item['link']['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $item['link']['url'] );
                        if ( $item['link']['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }
                        if ( $item['link']['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                        if ( ! empty( $settings['link']['custom_attributes'] ) ) {
                            // Custom URL attributes should come as a string of comma-delimited key|value pairs
                            $custom_attributes = Utils::parse_custom_attributes( $settings['link']['custom_attributes'] );
                            $widget->add_render_attribute( 'link', $custom_attributes);
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );
                    // Item Repeater Key
                    $item_key = $widget->get_repeater_setting_key( 'title_text', 'banners', $index );
                    $widget->add_render_attribute( $item_key, 'class', [
                        'banner-item',
                        'elementor-repeater-item-' . $item['_id'],
                    ] );
                    $class_attributes = $widget->get_render_attribute_string( $item_key );
                    $button_text = 'Read More';
                    if (!empty($item['button_text'])){
                        $button_text = $item['button_text'];
                    }
                    // Item Image
                    $item_img  = isset($item['item_img']) ? $item['item_img'] : [];
                    $thumbnail = '';
                    if(!empty($item_img['id'])) {
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $item_img['id'],
                            'thumb_size' => 'full',
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                    }
                    ?>
                    <div class="pxl-swiper-slide swiper-slide">
                        <div <?php pxl_print_html($class_attributes); ?>>
                            <div class="item-text">
                                <?php
                                if (!empty($item['title_text'])){
                                    ?>
                                    <h3 class="item-title">
                                        <?php echo pxl_print_html($item['title_text']); ?>
                                    </h3>
                                    <?php
                                }
                                if (!empty($item['description_text'])){
                                    ?>
                                    <div class="item-description">
                                        <?php echo esc_html($item['description_text']); ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="item-readmore">
                                    <a class="btn btn-secondary" <?php pxl_print_html($link_attributes); ?>>
                                        <span><?php echo esc_html($button_text); ?></span>
                                        <i class="pxli-arrow-right-solid"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="item-image tilt-hover">
                                <span style="background-image: url(<?php echo esc_url($item['item_background']['url']); ?>);">

                                </span>
                                </div>
                            <?php
                            if (! empty($thumbnail )){
                                ?>
                                <div class="item-image tilt-hover">
                                    <?php echo wp_kses_post($thumbnail);  ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrows style-default nav-vertical-out">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><span class="pxli-arrow-right"></span></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><span class="pxli-arrow-left"></span></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
