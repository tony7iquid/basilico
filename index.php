<?php
/**
 * @package Basilico
 */
get_header();

$theme_style = basilico()->get_theme_opt('theme_style', 'default');
$pxl_sidebar = basilico()->get_sidebar_args(['type' => 'blog', 'content_col'=> '8']); // type: blog, post, page, shop, product
?>
<div class="container">
    <div class="row <?php echo esc_attr($pxl_sidebar['wrap_class']) ?>" >
        <div id="pxl-content-area" class="<?php echo esc_attr($pxl_sidebar['content_class']) ?>">
            <?php if ( have_posts() ): ?>
            <main id="pxl-content-main" class="pxl-content-main content-archive">
                <?php
                    while ( have_posts() ) {
                        the_post();
                        switch ($theme_style) {
                            case 'pxl-pizza':
                                get_template_part( 'template-parts/content/content', 'pizza' );
                                break;
                            default:
                                get_template_part( 'template-parts/content/content' );
                        }
                    }
                ?>
            </main>
            <?php 
                basilico()->page->get_pagination();
            else:
                get_template_part( 'template-parts/content/content', 'none' );
            endif; ?>
        </div>
        <?php if ($pxl_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($pxl_sidebar['sidebar_class']) ?>">
                <div class="sidebar-sticky-wrap">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
