<?php
/**
 * Breadcrumbs Component
 * 
 * Автоматически генерирует хлебные крошки на основе текущей страницы
 * Использует WooCommerce breadcrumbs если доступны
 * 
 * Параметры:
 * $args['background_color'] - класс фона (по умолчанию 'bg-white')
 * $args['padding_class'] - класс отступов: 'py-4' или 'pt-4 pb-0' (по умолчанию 'py-4')
 * $args['margin_bottom'] - отступ снизу, например '-24px'
 * 
 * Использование:
 * <?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
 * 
 * или вот так 
 * 
 * <?php get_template_part('template-parts/breadcrumbs/breadcrumbs', null, array(
 *     'background_color' => 'bg-light',
 *     'padding_class' => 'pt-4 pb-0',
 *     'margin_bottom' => '-24px'
 * )); ?>
 */

$background_color = isset($args['background_color']) ? $args['background_color'] : 'bg-white';
$padding_class = isset($args['padding_class']) ? $args['padding_class'] : 'py-4';
$margin_bottom = isset($args['margin_bottom']) ? $args['margin_bottom'] : '';

// Формируем style для секции
$section_style = '';
if (!empty($margin_bottom)) {
    $section_style = ' style="margin-bottom: ' . esc_attr($margin_bottom) . ';"';
}
?>

<section class="<?php echo esc_attr($background_color); ?>"<?php echo $section_style; ?>>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumbs <?php echo esc_attr($padding_class); ?>">
                    <?php
                    // Используем хлебные крошки WooCommerce если доступны
                    if (function_exists('woocommerce_breadcrumb')) {
                        // Захватываем вывод WooCommerce breadcrumbs
                        ob_start();
                        woocommerce_breadcrumb(array(
                            'delimiter'   => ' / ',
                            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
                            'wrap_after'  => '</nav>',
                            'before'      => '',
                            'after'       => '',
                            'home'        => 'HOME_PLACEHOLDER',
                        ));
                        $breadcrumbs_html = ob_get_clean();
                        
                        // Заменяем плейсхолдер на SVG иконку домика
                        $svg_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" fill="currentColor" viewBox="0 0 24 24" class="svg-icon"><path d="m21.71 11.29-9-9a1 1 0 0 0-1.42 0l-9 9a1 1 0 0 0 1.42 1.42l.29-.3v7.89A1.77 1.77 0 0 0 5.83 22H8.5a1 1 0 0 0 1-1v-4.9a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1V21a1 1 0 0 0 1 1h2.67A1.77 1.77 0 0 0 20 20.3v-7.89l.29.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42" /></svg>';
                        echo str_replace('HOME_PLACEHOLDER', $svg_icon, $breadcrumbs_html);
                    } else {
                        // Fallback на базовые breadcrumbs если WooCommerce недоступен
                        ?>
                        <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                            <a href="<?php echo home_url('/'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" fill="currentColor" viewBox="0 0 24 24" class="svg-icon">
                                    <path d="m21.71 11.29-9-9a1 1 0 0 0-1.42 0l-9 9a1 1 0 0 0 1.42 1.42l.29-.3v7.89A1.77 1.77 0 0 0 5.83 22H8.5a1 1 0 0 0 1-1v-4.9a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1V21a1 1 0 0 0 1 1h2.67A1.77 1.77 0 0 0 20 20.3v-7.89l.29.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42" />
                                </svg>
                            </a>
                            
                            <?php if (is_post_type_archive('portfolio')) : ?>
                                / Портфолио
                            <?php elseif (is_tax('portfolio-cat')) : ?>
                                / <a href="/portfolio/">Портфолио</a> / <?php single_term_title(); ?>
                            <?php elseif (is_singular('portfolio')) : ?>
                                / <a href="/portfolio/">Портфолио</a> / <?php the_title(); ?>
                            <?php elseif (is_page()) : ?>
                                / <?php the_title(); ?>
                            <?php endif; ?>
                        </nav>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>