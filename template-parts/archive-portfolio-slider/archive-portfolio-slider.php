<?php
/**
 * Template part: Archive Portfolio Slider
 * 
 * Параметры:
 * $args['category']            - slug категории для фильтрации (например '06-shkafy'), если не указан - выводятся все работы
 * $args['section_title']       - заголовок секции, по умолчанию "Наши работы"
 * $args['section_description'] - описание секции (подзаголовок), по умолчанию "Представляем с гордостью!"
 * $args['background_color']    - цвет фона (например: 'bg-white', 'bg-light'), по умолчанию 'bg-white'
 * $args['posts_count']         - количество постов для вывода, по умолчанию -1 (все)
 * $args['card_type']           - тип карточки: 'approximation', 'zoom-card', 'hover-image', 'magnifier', по умолчанию 'approximation'
 * $args['show_button']         - показывать кнопку "Показать еще" (bool), по умолчанию true
 * $args['button_text']         - текст кнопки, по умолчанию 'Показать еще'
 * $args['button_link']         - ссылка кнопки, если не указан - формируется автоматически
 * $args['show_breadcrumbs']    - показывать хлебные крошки (bool), по умолчанию false
 * $args['breadcrumbs_items']   - массив элементов хлебных крошек (см. breadcrumbs.php)
 * 
 * Пример использования:
 * <?php 
 * get_template_part('template-parts/archive-portfolio-slider/archive-portfolio-slider', null, [
 *     'show_breadcrumbs' => true,
 *     'breadcrumbs_items' => [
 *         ['text' => 'Услуги', 'link' => '/services/'],
 *         ['text' => 'Кухни на заказ']
 *     ],
 *     'section_title' => 'Наши работы',
 *     'section_description' => 'Представляем с гордостью!',
 *     'category' => '06-shkafy',
 *     'posts_count' => 10,
 *     'card_type' => 'approximation'
 * ]); 
 * ?>
 */

// Устанавливаем значения по умолчанию
$category = isset($args['category']) ? $args['category'] : 'all';
$section_title = isset($args['section_title']) ? $args['section_title'] : 'Наши работы';
$section_description = isset($args['section_description']) ? $args['section_description'] : 'Представляем с гордостью!';
$background_color = isset($args['background_color']) ? $args['background_color'] : 'bg-white';
$posts_count = isset($args['posts_count']) ? $args['posts_count'] : -1;
$card_type = isset($args['card_type']) ? $args['card_type'] : 'approximation';
$show_button = isset($args['show_button']) ? $args['show_button'] : true;
$button_text = isset($args['button_text']) ? $args['button_text'] : 'Показать еще';
$show_card_title = isset($args['show_card_title']) ? $args['show_card_title'] : true;

// Автоматическое определение ссылки кнопки
if (!empty($category) && $category !== 'all') {
    $term = get_term_by('slug', $category, 'portfolio-cat');
    $button_link = $term ? get_term_link($term) : '/portfolio/';
} else {
    $button_link = '/portfolio/';
}
?>

<!-- Archive portfolio section -->
<section class="archive-portfolio-section-2 <?php echo esc_attr($background_color); ?>" style="padding-block: 60px;">
    <div class="container">
        <div class="row">
            <div class="col text-md-center">
                <h2><?php echo esc_html($section_title); ?></h2>

                <?php if ($section_description) : ?>
                <p class="section-description archive-portfolio mb-3"><?php echo esc_html($section_description); ?></p>
                <?php endif; ?>

                <svg width="62" height="14" viewBox="0 0 62 14" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" class="svg-icon mb-5">
                    <rect x="48" width="14" height="14" rx="3" />
                    <rect x="24" width="14" height="14" rx="3" />
                    <rect width="14" height="14" rx="3" />
                </svg>
            </div>
        </div>
        
        <div class="row">
            <?php
            $query_args = [
                'post_type' => 'portfolio',
                'numberposts' => $posts_count,
                'posts_per_page' => $posts_count
            ];
            
            // Добавляем фильтр по категории, если указан slug (не 'all')
            if (!empty($category) && $category !== 'all') {
                $query_args['portfolio-cat'] = $category;
            }

            $query = new WP_Query($query_args);
            
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    
                    // Подсчитываем количество изображений
                    $images_count = 0;
                    $i = 1;
                    while (get_post_meta($post->ID, '_img-' . $i, true)) {
                        $images_count++;
                        $i++;
                    }
                    ?>
                    <div class="col-md-6">
                        <div id="carouselExampleIndicators<?php echo $post->ID; ?>" class="carousel slide mb-4"
                            data-bs-ride="carousel" data-bs-interval="999999999">
                            
                            <?php if ($images_count > 1) : ?>
                            <div class="carousel-indicators" style="bottom: 5%;">
                                <?php
                                $i = 1;
                                $slide_index = 0;
                                while (get_post_meta($post->ID, '_img-' . $i, true)) { ?>
                                    <button type="button" data-bs-target="#carouselExampleIndicators<?php echo $post->ID; ?>"
                                        data-bs-slide-to="<?php echo $slide_index; ?>" 
                                        <?php if ($slide_index == 0) echo ' class="active"'; ?>
                                        aria-current="true" 
                                        aria-label="Slide <?php echo ($slide_index + 1); ?>"></button>
                            <?php
                                    $i++;
                                    $slide_index++;
                                }
                                ?>
                            </div>
                            <?php endif; ?>
                            
                            <div class="carousel-inner ">
                                <?php
                                $i = 1;
                                $img_index = 0;
                                while ($img_src = get_post_meta($post->ID, '_img-' . $i, true)) { ?>
                                    <div class="carousel-item <?php if ($i == 1) echo ' active'; ?>" data-bs-interval="999999999">
                                        <a onClick="galleryOn('gallery-<?php echo $post->ID; ?>','img-<?php echo $post->ID; ?>-<?php echo $img_index; ?>');">
                                            <?php 
                                            get_template_part('template-parts/cards/card', null, array(
                                                'image' => $img_src,
                                                'card_type' => $card_type,
                                                'link' => ''
                                            ));
                                            ?>
                                        </a>
                                    </div>
                            <?php
                                    $i++;
                                    $img_index++;
                                }
                                ?>
                            </div>
                            
                            <?php if ($images_count > 1) : ?>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators<?php echo $post->ID; ?>" 
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Предыдущий</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators<?php echo $post->ID; ?>" 
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Следующий</span>
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile;
            else : ?>
                <div class="col-12 text-center py-5">
                    <p>Проверьте категорию</p>
                </div>
            <?php endif;

            wp_reset_postdata();
            ?>
        </div>
        
        <?php if ($show_button && $query->have_posts()) : ?>
        <div class="row text-md-center">
            <div class="col">
                <a href="<?php echo esc_url($button_link); ?>" type="button" class="btn btn-lg btn-corporate-color-1">
                    <?php echo esc_html($button_text); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- /Archive-portfolio section -->