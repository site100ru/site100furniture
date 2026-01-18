<?php
/**
 * Section Portfolio One Tab
 * 
 * Выводит портфолио работ с одной вкладкой
 * 
 * Параметры:
 * $args['category']            - slug категории портфолио (например: 'kuhni', 'mebel'), если не указан - выводятся все работы
 * $args['section_title']       - заголовок секции, по умолчанию 'Последние выполненные работы'
 * $args['section_description'] - описание секции (текст под заголовком), по умолчанию пусто
 * $args['background_color']    - цвет фона (например: 'bg-white', 'bg-light', 'bg-dark'), по умолчанию 'bg-white'
 * $args['posts_count']         - количество выводимых работ, по умолчанию 6
 * $args['card_type']           - тип карточки: 'approximation', 'zoom-card', 'hover-image', 'magnifier', по умолчанию 'approximation'
 * $args['show_button']         - показывать кнопку "Смотреть еще" (bool), по умолчанию true
 * $args['button_text']         - текст кнопки, по умолчанию 'Смотреть еще'
 * $args['button_link']         - ссылка кнопки, если не указан - формируется автоматически
 * $args['show_breadcrumbs']    - показывать хлебные крошки (bool), по умолчанию false
 * $args['breadcrumbs_items']   - массив элементов хлебных крошек (см. breadcrumbs.php)
 * 
 * Пример использования:    
 * // Все работы портфолио
 * <?php get_template_part('template-parts/section-portfolio-tabs/section-portfolio-one-tab', null, array(
 *     'section_title' => 'Наши работы',
 *     'background_color' => 'bg-white',
 *     'posts_count' => 6,
 *     'card_type' => 'approximation'
 * )); ?>
 * 
 * // Работы конкретной категории
 * <?php get_template_part('template-parts/section-portfolio-tabs/section-portfolio-one-tab', null, array(
 *     'category' => 'kuhni',
 *     'section_title' => 'Кухни',
 *     'section_description' => 'Представляем с гордостью!',
 *     'background_color' => 'bg-light',
 *     'posts_count' => 9,
 *     'card_type' => 'zoom-card',
 *     'show_button' => false
 * )); ?>
 * 
 * // С хлебными крошками
 * <?php get_template_part('template-parts/section-portfolio-tabs/section-portfolio-one-tab', null, array(
 *     'category' => 'kuhni',
 *     'section_title' => 'Кухни на заказ',
 *     'show_breadcrumbs' => true,
 *     'breadcrumbs_items' => [
 *         ['text' => 'Услуги', 'link' => '/services/'],
 *         ['text' => 'Кухни на заказ']
 *     ]
 * )); ?>
 */

// Получаем параметры
$category = isset($args['category']) ? $args['category'] : 'all';
$section_title = isset($args['section_title']) ? $args['section_title'] : 'Последние выполненные работы';
$section_description = isset($args['section_description']) ? $args['section_description'] : '';
$background_color = isset($args['background_color']) ? $args['background_color'] : 'bg-white';
$posts_count = isset($args['posts_count']) ? $args['posts_count'] : 6;
$card_type = isset($args['card_type']) ? $args['card_type'] : 'approximation';
$show_button = isset($args['show_button']) ? $args['show_button'] : true;
$button_text = isset($args['button_text']) ? $args['button_text'] : 'Смотреть еще';
$show_card_title = isset($args['show_card_title']) ? $args['show_card_title'] : true;

// Автоматическое определение ссылки кнопки
if (!empty($category) && $category !== 'all') {
    $term = get_term_by('slug', $category, 'portfolio-cat');
    $button_link = $term ? get_term_link($term) : '/portfolio/';
} else {
    $button_link = '/portfolio/';
}

// Формируем аргументы запроса
$query_args = array(
    'post_type' => 'portfolio',
    'numberposts' => $posts_count,
    'posts_per_page' => $posts_count,
);

// Если указана категория (не 'all') - добавляем её в запрос
if (!empty($category) && $category !== 'all') {
    $query_args['portfolio-cat'] = $category;
}

// Получаем работы портфолио
$query = new WP_Query($query_args);
?>

<!-- SECTION PORTFOLIO -->
<section class="section-portfolio archive-portfolio-section-2 <?php echo esc_attr($background_color); ?>" style="padding-block: 60px;">
    <div class="container">
        <div class="row">
            <div class="col text-md-center">
                <h2 style="margin-bottom: 15px;"><?php echo esc_html($section_title); ?></h2>

                <?php if ($section_description) : ?>
                    <p class="section-description archive-portfolio mb-3"><?php echo esc_html($section_description); ?></p>
                <?php endif; ?>

                <svg style="margin-bottom: 60px;" width="62" height="14" viewBox="0 0 62 14" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" class="svg-icon">
                    <rect x="48" width="14" height="14" rx="3" />
                    <rect x="24" width="14" height="14" rx="3" />
                    <rect width="14" height="14" rx="3" />
                </svg>
                
                <div class="row">
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) :
                            $query->the_post();
                            $post_id = get_the_ID();
                            $image = get_post_meta($post_id, '_img-1', true);
                            $image_hover = get_post_meta($post_id, '_img-2', true);
                        ?>
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div onclick="galleryOn('gallery-<?php echo get_the_ID(); ?>', 'img-<?php echo get_the_ID(); ?>-0'); return false;" style="cursor: pointer;">
                                    <?php 
                                    get_template_part('template-parts/cards/card', null, array(
                                        'image' => $image,
                                        'image_hover' => $image_hover,
                                        'title' => get_the_title(),
                                        'show_title' => $show_card_title,
                                        'card_type' => $card_type,
                                        'link' => ''
                                    ));
                                    ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <div class="col-12">
                            <p class="text-center">Проверьте категорию</p>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($show_button && $query->have_posts()) : ?>
                    <a href="<?php echo esc_url($button_link); ?>" class="btn btn-lg btn-corporate-color-1 mt-3">
                        <?php echo esc_html($button_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION PORTFOLIO -->

<?php
wp_reset_postdata();
?>