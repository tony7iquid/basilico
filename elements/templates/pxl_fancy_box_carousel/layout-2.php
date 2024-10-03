<?php
$default_settings = [
    'boxs' => [],
];

$settings = array_merge($default_settings, $settings);
extract($settings);

$arrows = $widget->get_setting('arrows','false');  
$dots = $widget->get_setting('dots','false');  
$arrows_style = $widget->get_setting('arrows_style', 'style-1');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show_xxl'            => (float)$widget->get_setting('col_xxl', 1),
    'slides_to_show'                => (float)$widget->get_setting('col_xl', 1),
    'slides_to_show_lg'             => (float)$widget->get_setting('col_lg', 1),
    'slides_to_show_md'             => (float)$widget->get_setting('col_md', 1),
    'slides_to_show_sm'             => (float)$widget->get_setting('col_sm', 1),
    'slides_to_show_xs'             => (float)$widget->get_setting('col_xs', 1), 
    'slides_to_scroll'              => (int)$widget->get_setting('slides_to_scroll', 1), 
    'slides_gutter'                 => 30,
    'arrow'                         => $arrows,
    'dots'                          => $dots,
    'dots_style'                    => 'bullets',
    'autoplay'                      => (bool)$widget->get_setting('autoplay', false),
    'pause_on_hover'                => (bool)$widget->get_setting('pause_on_hover', true),
    'pause_on_interaction'          => true,
    'delay'                         => (int)$widget->get_setting('autoplay_speed', 5000),
    'loop'                          => (bool)$widget->get_setting('infinite', false),
    'speed'                         => (int)$widget->get_setting('speed', 500)
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container overflow-hidden',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);

?>
<?php if(isset($boxs) && !empty($boxs) && count($boxs)): ?>
<div class="pxl-swiper-slider pxl-fancy-box-carousel layout-<?php echo esc_attr($settings['layout'])?>">
    <div class="pxl-swiper-slider-wrap pxl-carousel-inner relative">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper swiper-wrapper">
                <?php foreach ($boxs as $key => $box): ?>
                    <div class="pxl-swiper-slide swiper-slide">
                        <div class="item-inner row">
                            <div class="overlay-1"></div>
                            <div class="overlay-2"></div>
                            <div class="overlay-3"></div>
                            <div class="item-content col-6">
                                <?php
                                if (!empty($box['title_text'])){
                                    ?>
                                    <h3 class="item-title">
                                        <span><?php echo pxl_print_html($box['title_text']); ?></span>
                                    </h3>
                                    <?php
                                }
                                if (!empty($box['description_text'])){
                                    ?>
                                    <div class="item-description">
                                        <?php echo pxl_print_html($box['description_text']); ?>
                                    </div>
                                    <?php
                                }
                                if(!empty($box['link']['url'])){
                                    $widget->add_render_attribute( 'link'.esc_attr($key), 'href', $box['link']['url'] );
                                    $widget->add_render_attribute( 'link'.esc_attr($key), 'class', 'btn '.$settings['btn_style'] );
                                    if ( $box['link']['is_external'] ) {
                                        $widget->add_render_attribute( 'link'.esc_attr($key), 'target', '_blank' );
                                    }
                                    if ( $box['link']['nofollow'] ) {
                                        $widget->add_render_attribute( 'link'.esc_attr($key), 'rel', 'nofollow' );
                                    }
                                    if ( ! empty( $box['link']['custom_attributes'] ) ) {
                                        $custom_attributes = Utils::parse_custom_attributes( $box['link']['custom_attributes'] );
                                        $widget->add_render_attribute( 'link'.esc_attr($key), $custom_attributes);
                                    }
                                }
                                $link_attributes = $widget->get_render_attribute_string( 'link'.esc_attr($key) );

                                if (!empty($box['button_text'])) { ?>
                                    <div class="item-button">
                                        <?php if ( $link_attributes ) echo '<a '. implode( ' ', [ $link_attributes ] ).'>'; ?>
                                        <span><?php pxl_print_html( nl2br($box['button_text'])); ?></span>
                                        <?php if ( $link_attributes ) echo '</a>'; ?> 
                                    </div>
                                <?php } ?>
                            </div>
                            <?php
                            if(!empty( $box['selected_img']['id'])){
                                $thumbnail = '';
                                $img  = pxl_get_image_by_size( array(
                                    'attach_id'  => $box['selected_img']['id'],
                                    'thumb_size' => 'full',
                                ) );
                                $thumbnail = $img['thumbnail'];
                                ?>
                                <div class="item-image col-6">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if ($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrows nav-vertical-out <?php echo esc_attr($arrows_style);?>">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><span class="pxl-icon zmdi zmdi-arrow-right"></span></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><span class="pxl-icon zmdi zmdi-arrow-left"></span></div>
            </div>
        <?php endif; ?>
        <?php if ($dots !== 'false'): ?>
            <div class="pxl-swiper-dots"></div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
