<?php

/**
 * Template Name: Архив портфолио
 * Template Post Type: page
 */

include 'header.php';

?>


<!-- Home section -->
<div id="sp-home" class="scroll-points"></div>
<section class="main-home-section min-home">
    <div class="parallax-home-section" style="min-height: 640px;"></div>

    <!-- header-menu -->
    <?php get_template_part('template-parts/header-menu/header-menu'); ?>

    <div class="container">
        <div class="row align-items-center home-section-height">
            <div class="col-xl-10 col-xxl-9">
                <h1 class="home-title">Наши работы</h1>
            </div>
        </div>
    </div>
</section>
<!-- /Home section -->


<!-- Хлебные крошки -->
<?php get_template_part('template-parts/breadcrumbs/breadcrumbs', null, array(
    'background_color' => 'bg-white',
    'padding_class' => 'pt-4 pb-0',
    'margin_bottom' => '-24px'
)); ?>


<!-- Вариант 1 - Section Portfolio Tabs -->
<?php get_template_part('template-parts/section-portfolio-tabs/section-portfolio-tabs', null, array(
    'category' => 'all',
    'section_title' => 'Вариант 1 - Section Portfolio Tabs',
    'section_description' => 'Портфолио в виде изображений в Табах (переход межку категориями портфолио без перегрузки страницы). Эффект наведения - плавное приближение.',
    'background_color' => 'bg-white',
    'posts_count' => 9,
    'card_type' => 'zoom-card',
    'show_button' => false,
    'button_text' => 'Смотреть еще',
    'show_filter' => false,
    'show_card_title' => false
)); ?>


<!-- Вариант 2 - Section Portfolio One Tab -->
<?php get_template_part('template-parts/section-portfolio-tabs/section-portfolio-one-tab', null, array(
    'category' => 'all',
    'section_title' => 'Вариант 2 - Section Portfolio One Tab',
    'section_description' => 'Все категории портфолио в виде карточек с изображениями. Эффект наведения - плавное исчезновение затемнения снизу.',
    'background_color' => 'bg-light',
    'posts_count' => 18,
    'card_type' => 'approximation',
    'show_button' => false,
    'button_text' => 'Смотреть все',
    'show_filter' => false,
    'show_card_title' => true
)); ?>


<!-- Вариант 3 - Section Portfolio One Tab с конкретной категорией -->
<?php get_template_part('template-parts/section-portfolio-tabs/section-portfolio-one-tab', null, array(
    'category' => '01-kuhni',
    'section_title' => 'Вариант 3 - Section Portfolio One Tab с конкретной категорией',
    'section_description' => 'Портфолио конкретной категории в виде карточек с изображениями. Эффект наведения - плавная замена изображения.',
    'background_color' => 'bg-white',
    'posts_count' => -1,
    'card_type' => 'hover-image',
    'show_button' => true,
    'button_text' => 'Смотреть все',
    'show_filter' => false,
    'show_card_title' => false
)); ?>


<!-- Пример 4: Archive Portfolio Slider -->
<?php get_template_part('template-parts/archive-portfolio-slider/archive-portfolio-slider', null, array(
    'category' => '01-kuhni',
    'section_title' => 'Вариант 4 - Archive Portfolio Slider',
    'section_description' => 'Портфолио в виде карточек со слайдером. Эффект наведения на карточку - появление лупы.',
    'background_color' => 'bg-light',
    'posts_count' => 8,
    'card_type' => 'magnifier',
    'show_button' => true,
    'button_text' => 'Показать еще',
    'show_filter' => true,
    'show_card_title' => false
)); ?>


<!-- Пример 5: Portfolio Masonry Gallery -->
<?php get_template_part('template-parts/portfolio-masonry-gallery/portfolio-masonry-gallery', null, array(
    'category' => 'all',
    'section_title' => 'Вариант 5 - Portfolio Masonry Gallery',
    'section_description' => 'Портфолио в виде галереи Masonry. Эффект наведения на карточку - плавное исчезновение затемнения снизу.',
    'background_color' => 'bg-white',
    'posts_count' => 18,
    'card_type' => 'approximation',
    'show_button' => false,
    'button_text' => 'Загрузить еще',
    'show_filter' => false,
    'show_card_title' => false
)); ?>


<!-- Пример 6: Portfolio Masonry Gallery с меню -->
<?php get_template_part('template-parts/portfolio-masonry-gallery/portfolio-masonry-gallery', null, array(
    'category' => 'all',
    'section_title' => 'Вариант 6 - Portfolio Masonry Gallery с меню',
    'section_description' => 'Портфолио в виде галереи Masonry с меню категорий. Эффект наведения на карточку - плавная смена изображения.',
    'background_color' => 'bg-light',
    'posts_count' => 18,
    'card_type' => 'hover-image',
    'show_button' => false,
    'button_text' => 'Загрузить еще',
    'show_filter' => true,
    'show_card_title' => false
)); ?>


<!-- Пример 7: Portfolio Masonry Gallery с конкретной категорией -->
<?php get_template_part('template-parts/portfolio-masonry-gallery/portfolio-masonry-gallery', null, array(
    'category' => '01-kuhni',
    'section_title' => 'Вариант 7 - Portfolio Masonry Gallery с конкретной категорией',
    'section_description' => 'Портфолио в виде галереи Masonry для конкретной категории. Эффект наведения на карточку - появление лупы.',
    'background_color' => 'bg-white',
    'posts_count' => 15,
    'card_type' => 'magnifier',
    'show_button' => false,
    'button_text' => 'Все кухни',
    'show_filter' => true,
    'show_card_title' => false
)); ?>


<?php include 'footer-1.php';