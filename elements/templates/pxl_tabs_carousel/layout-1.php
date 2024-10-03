<?php
$default_settings = [
    'content_list' => [],
];

$settings = array_merge($default_settings, $settings);
$widget->add_render_attribute('opts', [
    'data-settings' => wp_json_encode([
        'fade' => $widget->get_setting("fade", "false"),
        'dots' => $widget->get_setting("dots", "false"),
        'dots_style' => basilico()->get_theme_opt('swiper_pagination_style', 'style-df'),
        'swipe' => $widget->get_setting("swipe", "false")
    ])
]);
$fade = $widget->get_setting("fade", "false");
$arrows = $widget->get_setting("arrows", "false");
$arrows_style = $widget->get_setting("arrows_style", "style-df");
$dots_style = basilico()->get_theme_opt('swiper_pagination_style', 'style-df');
extract($settings);
$widget->add_render_attribute('link_id', 'id', $link_to_tabs);
?>

<div class="pxl-tabs-carousel-container">
    <div class="pxl-swiper-slider-wrap pxl-carousel-inner">
        <div class="pxl-tabs-carousel" <?php pxl_print_html($widget->get_render_attribute_string('link_id')); ?> <?php pxl_print_html($widget->get_render_attribute_string('opts')); ?>>
            <?php foreach ($tabs_list_carousel as $key => $tab_carousel) : ?>
                <div class="pxl-carousel-item">
                    <?php
                    $content_key_carousel = $widget->get_repeater_setting_key('tab_content_carousel', 'tabs_list_carousel', $key);
                    $tabs_content_carousel = '';
                    if ($tab_carousel['content_type'] == 'template' && !empty($tab_carousel['content_template'])) {
                        $content_carousel = Elementor\Plugin::$instance->frontend->get_builder_content_for_display((int)$tab_carousel['content_template']);
                        $tabs_content_carousel = $content_carousel;
                    } elseif ($tab_carousel['content_type'] == 'df') {
                        $tabs_content_carousel = $tab_carousel['tab_content_carousel'];
                    }
                    $widget->add_render_attribute($content_key_carousel, [
                        'class' => ['tab-content-carousel'],
                        'id' => $element_id . '-' . $tab_carousel['_id'],
                    ]);
                    if ($tab_carousel['content_type'] == 'df') {
                        $widget->add_inline_editing_attributes($content_key_carousel, 'advanced');
                    }
                    ?>
                    <?php pxl_print_html($tabs_content_carousel); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if ($arrows != false) : ?>
        <div class="pxl-swiper-arrows nav-vertical-in <?php echo esc_attr($arrows_style); ?>">
            <?php if ($arrows_style == 'style-2') : ?>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><span class="pxl-icon zmdi zmdi-arrow-left"></span></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><span class="pxl-icon zmdi zmdi-arrow-right"></span></div>
            <?php else: ?>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><span class="pxl-icon pxli-thin-arrow-left"></span></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><span class="pxl-icon pxli-thin-arrow-right"></span></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>