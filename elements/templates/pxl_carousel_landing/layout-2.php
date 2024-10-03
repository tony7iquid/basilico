<?php
$default_settings = [
    'content_list' => [],
];
$settings = array_merge($default_settings, $settings);
extract($settings); 

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
$img_size = !empty( $img_size ) ? $img_size : '430x550'; 
?>

<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="pxl-carousel-landing layout-<?php echo esc_attr($settings['layout'])?>">
        <a id="circle-cursor" class="circle-cursor">
            <span><?php echo esc_html($button_text); ?></span>
        </a>
        <div class="pxl-image-slide1 add-custom-cursor">
            <div class="pxl-image-slide">
              
                    <?php foreach ($settings['content_list'] as $key => $value):
                        $image_layout2 = isset($value['image_layout2']) ? $value['image_layout2'] : '';
                        $thumbnail = '';
                        if (!empty($image_layout2['id'])) {
                            $img = pxl_get_image_by_size([
                                'attach_id'  => $image_layout2['id'],
                                'thumb_size' => $img_size,
                                'class'      => 'no-lazyload',
                            ]);
                            if (isset($img['thumbnail'])) {
                                $thumbnail = $img['thumbnail'];
                            }
                        }
                        ?>
                        <?php if(!empty($thumbnail)) { ?>
                            <div class="item-image col-auto">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
          
            </div>
            <div class="pxl-image-slide">
          
                    <?php foreach ($settings['content_list'] as $key => $value):
                        $image_layout2 = isset($value['image_layout2']) ? $value['image_layout2'] : '';
                        $thumbnail = '';
                        if (!empty($image_layout2['id'])) {
                            $img = pxl_get_image_by_size([
                                'attach_id'  => $image_layout2['id'],
                                'thumb_size' => $img_size,
                                'class'      => 'no-lazyload',
                            ]);
                            if (isset($img['thumbnail'])) {
                                $thumbnail = $img['thumbnail'];
                            }
                        }
                        ?>
                        <?php if(!empty($thumbnail)) { ?>
                            <div class="item-image col-auto">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
          
            </div>
        </div>
    </div>
<?php endif; ?>
  