<?php

/**
 * Template Name: Архив портфолио по категориям
 * Template Post Type: portfolio
 */

include 'header.php';

$current_term = get_queried_object(); // определяем ID текущей категории
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
                <h1 class="home-title" style="color: #fff;">Наши работы</h1>
            </div>
        </div>
    </div>
</section>
<!-- /Home section -->

<!-- Portfolio Section -->
<?php 
get_template_part('template-parts/portfolio-masonry-gallery/portfolio-masonry-gallery', null, [
    'bg_color' => 'bg-white',
    'category' => $current_term->slug,
    'show_title' => true,
    'show_breadcrumbs' => true,
    'show_filter' => true,
    'section_title' => 'Наши работы'
]); 
?>
<!-- /Portfolio Section -->

<?php include 'footer-1.php'; ?>