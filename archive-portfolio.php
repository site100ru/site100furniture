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

<!-- Пример 1: Section Portfolio One Tab -->
<?php get_template_part('template-parts/section-portfolio-tabs/section-portfolio-one-tab', null, array(
    'category' => '01-kuhni',
    'section_title' => 'Вариант 1 - Section Portfolio One Tab',
    'section_description' => 'Базовый блок портфолио для категории, поддержка хлебных крошек и кнопки.',
    'background_color' => 'bg-white',
    'posts_count' => 6,
    'card_type' => 'approximation',
    'show_button' => true,
    'button_text' => 'Смотреть все кухни',
    'show_filter' => false,
    'show_card_title' => false
)); ?>

<!-- Пример 2: Section Portfolio Tabs -->
<?php get_template_part('template-parts/section-portfolio-tabs/section-portfolio-tabs', null, array(
    'category' => 'all',
    'section_title' => 'Вариант 2 - Section Portfolio Tabs',
    'section_description' => 'Переключение категорий через табы без перезагрузки. Автоматическая генерация вкладок для НЕПУСТЫХ категорий.',
    'background_color' => 'bg-light',
    'posts_count' => 9,
    'card_type' => 'zoom-card',
    'show_button' => true,
    'button_text' => 'Смотреть еще',
    'show_filter' => false,
    'show_card_title' => false
)); ?>

<!-- Пример 3: Archive Portfolio Slider -->
<?php get_template_part('template-parts/archive-portfolio-slider/archive-portfolio-slider', null, array(
    'category' => '02-prikhozhie',
    'section_title' => 'Вариант 3 - Archive Portfolio Slider',
    'section_description' => 'Карусель Bootstrap с навигацией и индикаторами. Фильтр по категории.',
    'background_color' => 'bg-white',
    'posts_count' => 8,
    'card_type' => 'magnifier',
    'show_button' => true,
    'button_text' => 'Показать еще',
    'show_filter' => false,
    'show_card_title' => false
)); ?>

<!-- Пример 4: Archive Portfolio Section -->
<?php get_template_part('template-parts/archive-portfolio-section/archive-portfolio-section', null, array(
    'category' => 'all',
    'section_title' => 'Вариант 4 - Archive Portfolio Section',
    'section_description' => 'Masonry layout с динамической сеткой. Горизонтальный фильтр категорий.',
    'background_color' => 'bg-white',
    'posts_count' => 12,
    'card_type' => 'approximation',
    'show_button' => true,
    'button_text' => 'Загрузить еще',
    'show_filter' => true,
    'show_card_title' => false
)); ?>

<!-- Пример 5: Section Portfolio One Tab без кнопки -->
<?php get_template_part('template-parts/section-portfolio-tabs/section-portfolio-one-tab', null, array(
    'category' => '01-kuhni',
    'section_title' => 'Вариант 5 - One Tab без кнопки',
    'section_description' => 'Вывод всех работ категории без пагинации. Карточки с hover-эффектом смены изображения.',
    'background_color' => 'bg-light',
    'posts_count' => -1,
    'card_type' => 'hover-image',
    'show_button' => false,
    'button_text' => 'Смотреть еще',
    'show_filter' => false,
    'show_card_title' => true
)); ?>

<!-- Пример 6: Archive Portfolio Section с категорией -->
<?php get_template_part('template-parts/archive-portfolio-section/archive-portfolio-section', null, array(
    'category' => '01-kuhni',
    'section_title' => 'Вариант 6 - Masonry одна категория',
    'section_description' => 'Masonry layout для конкретной категории. Фильтр скрыт, карточки magnifier с лупой.',
    'background_color' => 'bg-white',
    'posts_count' => 15,
    'card_type' => 'magnifier',
    'show_button' => true,
    'button_text' => 'Все кухни',
    'show_filter' => false,
    'show_card_title' => false
)); ?>

<!-- Пример 7: Section Portfolio One Tab компактный -->
<?php get_template_part('template-parts/section-portfolio-tabs/section-portfolio-one-tab', null, array(
    'category' => 'all',
    'section_title' => 'Вариант 7 - One Tab компактный',
    'section_description' => 'Только заголовок и карточки. Без описания, хлебных крошек и кнопки. 3 работы zoom-эффект.',
    'background_color' => 'bg-light',
    'posts_count' => 3,
    'card_type' => 'zoom-card',
    'show_button' => false,
    'button_text' => 'Смотреть еще',
    'show_filter' => false,
    'show_card_title' => false
)); ?>

<!-- Пример 8: Archive Portfolio Section максимальный -->
<?php get_template_part('template-parts/archive-portfolio-section/archive-portfolio-section', null, array(
    'category' => 'all',
    'section_title' => 'Вариант 8 - Masonry максимальный',
    'section_description' => 'Полная конфигурация: хлебные крошки, фильтр, hover-карточки, кнопка.',
    'background_color' => 'bg-white',
    'posts_count' => 18,
    'card_type' => 'hover-image',
    'show_button' => true,
    'button_text' => 'Загрузить еще',
    'show_filter' => true,
    'show_card_title' => false
)); ?>

<?php include 'footer-1.php'; ?>