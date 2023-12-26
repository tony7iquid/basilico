<?php
$default_settings = [
    'content_list' => [],
];
   
$settings = array_merge($default_settings, $settings);
extract($settings);

$arrows = $widget->get_setting('arrows','false');  
$dots = $widget->get_setting('dots','false');  

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show_xxl'            => $widget->get_setting('col_xxl', '4'), 
    'slides_to_show'                => $widget->get_setting('col_xl', '4'), 
    'slides_to_show_lg'             => $widget->get_setting('col_lg', '3'), 
    'slides_to_show_md'             => $widget->get_setting('col_md', '3'), 
    'slides_to_show_sm'             => $widget->get_setting('col_sm', '2'), 
    'slides_to_show_xs'             => $widget->get_setting('col_xs', '1'), 
    'slides_to_scroll'              => $widget->get_setting('slides_to_scroll', '1'), 
    'slides_gutter'                 => 30, 
    'arrow'                         => $arrows,
    'dots'                          => $dots,
    'dots_style'                    => 'bullets',
    'autoplay'                      => $widget->get_setting('autoplay', 'false'),
    'pause_on_hover'                => $widget->get_setting('pause_on_hover', 'true'),
    'pause_on_interaction'          => 'true',
    'delay'                         => $widget->get_setting('autoplay_speed', '5000'),
    'loop'                          => $widget->get_setting('infinite','true'),
    'speed'                         => $widget->get_setting('speed', '500'),
];
  

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="pxl-swiper-slider pxl-testimonial-carousel layout-<?php echo esc_attr($settings['layout'])?>">
        <div class="pxl-swiper-thumbs-wrap d-flex justify-content-center">
            <div class="pxl-swiper-thumbs overflow-hidden" data-drag = "false" data-center = "true" data-item ="5" data-gutter ="20" data-loop ="false">
                <div class="pxl-thumbs-wrapper swiper-wrapper ">
                    <?php
                    $idx = 0;
                    foreach ($content_list as $key => $value):
                        $idx++;
                        $image       = isset($value['image']) ? $value['image'] : [];
                        $thumbnail = '';
                        if(!empty($image['id'])) {
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => '250x250',
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];
                        }
                        ?>
                        <div class="thumb-item swiper-slide">
                            <div class="thumbs-wrap">
                                <div class="item-wrap">
                                    <?php if(!empty($thumbnail)) :?>
                                        <div class="item-image col-auto">
                                            <span class="img-outer">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
        if (!empty($settings['testimonial_title'])){
            ?><h4 class="testimonial-title"><?php echo esc_html($settings['testimonial_title']); ?></h4><?php
        }
        ?>
        <div class="pxl-swiper-slider-wrap pxl-carousel-inner relative">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper swiper-wrapper">
                <?php foreach ($content_list as $key => $value):
                    $description = isset($value['description']) ? $value['description'] : '';
                    $title       = isset($value['title']) ? $value['title'] : '';
                    $position    = isset($value['position']) ? $value['position'] : '';
                    ?>
                    <div class="pxl-swiper-slide swiper-slide">
                        <div class="item-inner">
                            <div class="item-desc"><?php echo pxl_print_html($description); ?></div>
                            <div class="item-info">
                                <?php if(!empty($value['rating']) && $value['rating'] != 'none') : ?>
                                    <div class="item-rating-star">
                                        <div class="item-rating <?php echo esc_attr($value['rating']); ?>">
                                            <i class="pxli-star1"></i>
                                            <i class="pxli-star1"></i>
                                            <i class="pxli-star1"></i>
                                            <i class="pxli-star1"></i>
                                            <i class="pxli-star1"></i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <h4 class="item-title"><?php echo esc_html($title); ?></h4>
                                <div class="item-position"><?php echo esc_html($position); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrows style-default nav-vertical-out">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><span class="pxli-arrow-left"></span></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><span class="pxli-arrow-right"></span></div>
                </div>
            <?php endif; ?>
            <?php if($dots !== 'false'): ?>
                <div class="pxl-swiper-dots"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>