<?php
	
	/**
	 * Template Name: Главная
	 * Template Post Type: page
	 */
	
	include 'header.php';
	
?>

		
<section class="home-section-video">
	<!-- Header -->
	<div class="site-navbar-wrap">
		<div id="sp-home" class="scroll-points"></div>
		<header class="d-none d-lg-block">
			<!-- Header nav top -->
			<nav class="header-nav-top navbar navbar-expand-lg navbar-light d-none d-lg-block py-0">
				<div class="container">
					<div class="collapse navbar-collapse">
						<ul class="navbar-nav ms-auto align-items-center">
							<li class="nav-item me-1 me-xxl-3">
								<a class="nav-link" href="#">
									<div style="display: flex;">
										<div class="nav-li-float-left">
											<img src="<?php echo get_template_directory_uri(); ?>/img/ico/location-ico.svg">
										</div>
										<div class="nav-li-float-right" >
											гор. Рязань,<br>ул. Чапаева, 56
										</div>
										<div style="clear: both;"></div>
									</div>
								</a>
							</li>
							<li class="nav-item me-1 me-xxl-3">
								<a class="nav-link" href="#">
									<div style="display: flex;">
										<div class="nav-li-float-left">
											<img src="<?php echo get_template_directory_uri(); ?>/img/ico/clock-ico.svg">
										</div>
										<div class="nav-li-float-right" >
											Пн-Сб: с 10.00-19.00<br>Вс: с 10.00-17.00
										</div>
										<div style="clear: both;"></div>
									</div>
								</a>
							</li>
							<li class="nav-item me-1 me-xxl-3">
								<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#callbackModal">
									<div style="display: flex;">
										<div class="nav-li-float-left">
											<img src="<?php echo get_template_directory_uri(); ?>/img/ico/callback-ico.svg">
										</div>
										<div class="nav-li-float-right max-width-1400" >
											Обратный звонок
										</div>
										<div style="clear: both;"></div>
									</div>
								</a>
							</li>
							<li class="nav-item me-1 me-xxl-4">
								<a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#calculatePriceWithDownloadModal">
									<div style="display: flex;">      
										<div class="nav-li-float-left">
											<img src="<?php echo get_template_directory_uri(); ?>/img/ico/calculator-ico.svg">
										</div>
										<div class="nav-li-float-right max-width-1400" >
											Рассчитать стоимость
										</div>
										<div style="clear: both;"></div>
									</div>
								</a>
							</li>
							<li class="nav-item me-1 me-xxl-4">
								<a class="top-menu-tel nav-link" href="tel:89511014610">
									<div style="display: flex;">
										<div class="nav-li-float-left">
											<img src="<?php echo get_template_directory_uri(); ?>/img/ico/mobile-phone-ico.svg">
										</div>
										<div class="nav-li-float-right" style="min-width: 128px;">
										    8 (4912) 77-70-98
										</div>
										<div style="clear: both;"></div>
									</div>
								</a>
							</li>
							<li class="nav-item me-1 me-xxl-4">
								<a class="top-menu-tel nav-link" href="tel:89511014610">
									<div style="display: flex;">
										<div class="nav-li-float-left">
											<img src="<?php echo get_template_directory_uri(); ?>/img/ico/mobile-phone-ico.svg">
										</div>
										<div class="nav-li-float-right" style="min-width: 128px;">
											8 (951) 101-46-10
										</div>
										<div style="clear: both;"></div>
									</div>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ico-button" href="https://t.me/+79511014610">
									<img src="<?php echo get_template_directory_uri(); ?>/img/ico/telegram-ico.svg">
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ico-button" href="https://wa.me/79511014610?web=1&app_absent=1">
									<img src="<?php echo get_template_directory_uri(); ?>/img/ico/whatsapp-ico.svg">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- /Header nav top -->
			
			<!-- Header nav bottom -->
			<nav class="header-nav-bottom navbar navbar-expand-lg navbar-light py-0">
				<div class="container">
					<a class="navbar-brand" href="/">
						<img src="<?php echo get_template_directory_uri(); ?>/img/ico/logo-light.svg">
					</a>
					
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobail-header-collapse" aria-controls="mobail-header-collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<div class="collapse navbar-collapse" id="mobail-header-collapse">
						<?php
							wp_nav_menu(array(
								'theme_location' => 'mobail-header-collapse',
								'container' => false,
								'menu_class' => '',
								'fallback_cb' => '__return_false',
								'items_wrap' => '
									<ul id="%1$s" class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0 %2$s">%3$s
										<!-- Mobile menu -->
										<li class="nav-item d-lg-none">
											<a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#measurerModal">Вызов замерщика</a>
										</li>
										<li class="nav-item d-lg-none">
											<div style="font-size: 12px; font-family: HelveticaNeueCyr-Light; text-transform: none;">
												<img src="'.get_template_directory_uri().'/img/ico/location-ico.svg" style="width: 10px;" class="me-1">
													<span>гор. Рязань, ул. Чапаева, 56</span>
											</div>
											<a class="nav-link top-menu-tel pt-1 pb-1" href="tel:89511014610">8 (951) 101-46-10</a>
											<div class="mb-2" style="font-size: 12px; font-family: HelveticaNeueCyr-Light; text-transform: none;">
												<img src="'.get_template_directory_uri().'/img/ico/clock-ico.svg" style="width: 10px; position: relative; top: 2px;" class="me-1 mb-2">Пн-Сб: с 10.00-19.00, Вс: с 10.00-17.00
											</div>
										</li>
										<li class="nav-item d-lg-none pb-4">
											<a class="ico-button pe-2" href="https://wa.me/79511014610?web=1&app_absent=1">
												<img src="'.get_template_directory_uri().'/img/ico/whatsapp-ico.svg">
											</a>
											<a class="ico-button pe-0" href="https://t.me/+79511014610">
												<img src="'.get_template_directory_uri().'/img/ico/telegram-ico.svg">
											</a>
										</li>	
										<!-- End mobile menu -->
									</ul>
								',
								'depth' => 2,
								'walker' => new bootstrap_5_wp_nav_menu_walker()
							));
						?>
					</div>

				</div>
			</nav>
			<!-- /Header nav bottom -->
		</header>
		
		
		<header id="sliding-header" class="shadow">
			<!-- Header nav bottom -->
			<nav class="header-nav-bottom navbar navbar-expand-lg navbar-light py-1 py-lg-0">
				<div class="container">
					<a class="navbar-brand" href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/img/ico/logo-dark.svg">
					</a>
					
					<div class="d-lg-none">
						<a class="top-menu-tel pt-1 pb-0" style="font-size: 14px;" href="tel:89511014610">8 (951) 101-46-10</a>
						<div style="font-size: 10px; font-family: Gilroy-Light; text-transform: none;">
							<img src="<?php echo get_template_directory_uri(); ?>/img/ico/clock-ico.svg" style="width: 12px; position: relative; top: -1px;" class="me-1">Пн-Сб: с 10.00-19.00<br>Вс: с 10.00-17.00
						</div>
					</div>
					
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sliding-header-collapse" aria-controls="sliding-header-collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<div class="collapse navbar-collapse" id="sliding-header-collapse">
						<?php
							wp_nav_menu(array(
								'theme_location' => 'sliding-header-collapse',
								'container' => false,
								'menu_class' => '',
								'fallback_cb' => '__return_false',
								'items_wrap' => '
									<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-lg-0 %2$s">%3$s
										<!-- Mobile menu -->
										<li class="nav-item d-lg-none">
											<a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#measurerModal">Вызов замерщика</a>
										</li>
										<li class="nav-item d-lg-none">
											<div style="font-size: 12px; font-family: Gilroy-Light; text-transform: none;">
												<img src="'. get_template_directory_uri().'/img/ico/location-ico.svg" style="width: 10px; position: relative; top: -2px;" class="me-1">
												<span>гор. Рязань, ул. Чапаева, 56</span>
											</div>
											<a class="nav-link top-menu-tel pt-1 pb-1" href="tel:89511014610">8 (951) 101-46-10</a>
											<div class="mb-2" style="font-size: 12px; font-family: Gilroy-Light; text-transform: none;">
												<img src="'.get_template_directory_uri().'/img/ico/clock-ico.svg" style="width: 10px; position: relative; top: 3px;" class="me-1 mb-2">Пн-Сб: с 10.00-19.00, Вс: с 10.00-17.00
											</div>
										</li>
										<li class="nav-item d-lg-none pb-2">
											<a class="ico-button pe-2" href="https://wa.me/79511014610?web=1&app_absent=1">
												<img src="'.get_template_directory_uri().'/img/ico/whatsapp-ico.svg">
											</a>
											<a class="ico-button pe-0" href="https://t.me/+79511014610">
												<img src="'.get_template_directory_uri().'/img/ico/telegram-ico.svg">
											</a>
										</li>	
										<!-- End mobile menu -->
									</ul>
								',
								'depth' => 2,
								'walker' => new bootstrap_5_wp_nav_menu_walker()
							));
						?>
					</div>

				</div>
			</nav>
			<!-- /Header nav bottom -->
		</header><!-- site-navbar -->
	</div>
	
	<!-- home-video-section -->
	<div class="site-blocks-cover home-video-section">
		<video autoplay loop playsinline muted>
			<source src="<?php echo get_template_directory_uri(); ?>/video/home-video-section-bg.mp4">
		</video>
		<div class="overlay" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.15) 35%, rgba(0, 0, 0, 0.15) 100%);"></div>
		
		<div class="container">
			<div class="row align-items-center text-md-center justify-content-center" style="height: calc(100vh);">
				<div class="col-md-9 margin-title-with-span"></div>
			</div>
		</div>
	</div>
	<!-- END home-video-section -->
	
</section>
<!-- /Header -->



<!-- Action -->
<section class="archive-portfolio-section archive-portfolio bg-white py-5">
	<div class="container">
		<div class="row">
			<div class="col text-md-center">
				<h2>Каталог проектов</h2>
				<img src="<?php echo get_template_directory_uri(); ?>/img/ico/section-title-dec.svg" style="margin-bottom: 60px;">	
			</div>
		</div>
		<div class="row text-start">
			<div class="col-md-6 mb-5">
				<a href="/furniture/product-category/кухни/">
					<div class="approximation project-container-2 services">
						<img src="<?php echo get_template_directory_uri(); ?>/img/card1.png" class="img-fluid" alt="">
						<div class="card-wrapper project-container-2-footer">
							<div class="row" style="height: 100%;">
								<div class="col-6">
									<h3 style="position: absolute; bottom: 0; width: 100%;">Проекты кухонь</h3>		
								</div>
							</div>
						</div>	
					</div>
				</a>
			</div>
			<div class="col-md-6 mb-5">
				<a href="/furniture/product-category/шкафы/">
					<div class="services approximation project-container-2">
						<img src="<?php echo get_template_directory_uri(); ?>/img/closet-2-4.webp" class="img-fluid" alt="" decoding="async" />	
						<div class="card-wrapper project-container-2-footer">
							<div class="row" style="height: 100%;">
								<div class="col-6">
									<h3 style="position: absolute; bottom: 0; width: 100%;">Проекты шкафов</h3>		
								</div>
							</div>
						</div>	
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- /Action -->



<!-- ABOUT SECTION -->
<section class="about-section bg-light py-5">
	<div class="container">
		<div class="row">
			<div class="col text-md-center">
				<h2>О нас</h2>
				<img src="<?php echo get_template_directory_uri(); ?>/img/ico/section-title-dec.svg" class="mb-5">
			</div>
		</div>
		<!-- Слайдер Bootstrap -->
		<div class="row justify-content-between about_box">
			<div class="col-12 col-lg-6 order-2 order-lg-first text-center">
				
				<div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner rounded">
						<div class="carousel-item active">
							<a onClick="aboutSectionGalleryOn('aboutSectionGallery','imgAboutSectionGallery-1');">
								<div class="single-product-img approximation">
									<img src="<?php echo get_template_directory_uri(); ?>/img/about-section-slide-1.jpg" class="d-block w-100" loading="lazy" alt="...">
									<div class="magnifier"></div>
								</div>
							</a>
						</div>
						<div class="carousel-item">
							<a onClick="aboutSectionGalleryOn('aboutSectionGallery','imgAboutSectionGallery-2');">
								<div class="single-product-img approximation">
									<img src="<?php echo get_template_directory_uri(); ?>/img/about-section-slide-2.jpeg" class="d-block w-100" loading="lazy" alt="...">
									<div class="magnifier"></div>
								</div>
							</a>
						</div>
						<div class="carousel-item">
							<a onClick="aboutSectionGalleryOn('aboutSectionGallery','imgAboutSectionGallery-3');">
								<div class="single-product-img approximation">
									<img src="<?php echo get_template_directory_uri(); ?>/img/about-section-slide-3.jpeg" class="d-block w-100" loading="lazy" alt="...">
									<div class="magnifier"></div>
								</div>
							</a>
						</div>
					</div>
					<!-- Кнопки навигации -->
					<button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Предыдущий</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Следующий</span>
					</button>
				</div>
			</div>
			<!-- Описание -->
			<div class="col-12 col-lg-5 offset-lg-1 order-1 order-lg-last mb-lg-0 description_about">
				<p class="text-start">Студия кухни «Мозаика» поможет каждому клиенту при выборе мебели по индивидуальным размерам, бесплатный дизайн-проект любой сложности, большой выбор мебели по цветовой гамме и ценовой категории.</p>
				<p class="text-start">Обширный ассортимент фасадного материала такие как: Fundermax, Альтернатив, AGT, Feelwood, TSS. Для каждого клиента подбираем по его желаниям и возможностям европейскую фурнитуру, таких фирм как: Blum, Boyard, Hettich, VIBO и др. А также у нас можно укомплектовать мебель кухонной техникой известных фирм: Эликор, Midea, Куперсберг и др.</p>
				<p class="text-start">Нашими партнерами являются крупные фабрики «Ульяновск», «CUCINA», г. Пенза «Лев Мебель», «Мебель стиль».</p>
			</div>
		</div>
	</div>
</section>
<!-- /ABOUT SECTION -->

<!-- /ABOUT SECTION GALLERY -->
<div  id="aboutSectionGalleryWrapper">
	<div id="aboutSectionGallery"  class="carousel slide" data-bs-ride="false" data-bs-interval="false"  style="display: none;  position: fixed;  top: 0;  height: 100%;  width: 100%;">
		<div class="carousel-indicators">
			<button id="indAboutSectionGallery-1" type="button" data-bs-target="#aboutSectionGallery" data-bs-slide-to="0" aria-label="Slide 1"></button>
			<button id="indAboutSectionGallery-2" type="button" data-bs-target="#aboutSectionGallery" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button id="indAboutSectionGallery-3" type="button" data-bs-target="#aboutSectionGallery" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner h-100">
			<div id="imgAboutSectionGallery-1" class="carousel-item h-100">
				<div class="row align-items-center h-100">
					<div class="col text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/about-section-slide-1.jpg"  class="img-fluid lazyload"  loading="lazy" style="max-width: 75vw; max-height: 75vh"  alt="..."/>
					</div>
				</div>
			</div>
			<div id="imgAboutSectionGallery-2" class="carousel-item h-100">
				<div class="row align-items-center h-100">
					<div class="col text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/about-section-slide-2.jpeg"  class="img-fluid lazyload"  loading="lazy"  style="max-width: 75vw; max-height: 75vh"  alt="..."/>
					</div>
				</div>
			</div>
			<div id="imgAboutSectionGallery-3" class="carousel-item h-100">
				<div class="row align-items-center h-100">
					<div class="col text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/about-section-slide-3.jpeg" class="img-fluid lazyload" loading="lazy"  style="max-width: 75vw; max-height: 75vh"  alt="..."/>
					</div>
				</div>
			</div>
		</div>
		<button  class="carousel-control-prev"  type="button"  data-bs-target="#aboutSectionGallery"  data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next"  type="button" data-bs-target="#aboutSectionGallery" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

	<!-- Кнопка закрытия галереи -->
	<button  type="button"  onClick="aboutSectionGalleryClose();" class="btn-close btn-close-white" style="position: fixed; top: 25px; right: 25px; z-index: 99999" aria-label="Close"></button>
</div>
<!-- /ABOUT SECTION GALLERY -->

<!-- /ABOUT SECTION GALLERY SCRIPT -->
<script>
  /* Gallery opening function */
  function aboutSectionGalleryOn(gal, img) {
		var gallery = gal; // Получаем ID галереи
		var image = img; // Получаем ID картинки
	
		// Открываем обертку галереи
		document.getElementById( "aboutSectionGalleryWrapper" ).style.display = "block";

		// Открываем галерею
		if ( gallery == "aboutSectionGallery" ) { document.getElementById( "aboutSectionGallery" ).style.display = "block"; }
	
		/* Открываем изображения и индикаторы галереи */
		if ( image == "imgAboutSectionGallery-1" ) {
			document.getElementById("imgAboutSectionGallery-1").classList.add("active");
			document.getElementById("indAboutSectionGallery-1").classList.add("active");
		}
		if ( image == "imgAboutSectionGallery-2" ) {
			document.getElementById("imgAboutSectionGallery-2").classList.add("active");
			document.getElementById("indAboutSectionGallery-2").classList.add("active");
		}
		if ( image == "imgAboutSectionGallery-3" ) {
			document.getElementById("imgAboutSectionGallery-3").classList.add("active");
			document.getElementById("indAboutSectionGallery-3").classList.add("active");
		}

	} /* Ending gallery opening function */


	// Кнопка закрытия галереи
	function aboutSectionGalleryClose() {
		// Закрываем обертку галереи
		document.getElementById("aboutSectionGalleryWrapper").style.display = "none";
		
		// Закрываем галерею
		document.getElementById("aboutSectionGallery").style.display = "none";
		
		/* Закрываем тзображения и индикаторы галереи */
		document.getElementById("imgAboutSectionGallery-1").classList.remove("active");
		document.getElementById("indAboutSectionGallery-1").classList.remove("active");
		document.getElementById("imgAboutSectionGallery-2").classList.remove("active");
		document.getElementById("indAboutSectionGallery-2").classList.remove("active");
		document.getElementById("imgAboutSectionGallery-3").classList.remove("active");
		document.getElementById("indAboutSectionGallery-3").classList.remove("active");
	}
</script>
<!-- /ABOUT SECTION GALLERY SCRIPT -->



<!-- Advantage section -->
<section class="advantage bg-white py-5">
	<div class="container">
		<div class="row">
			<div class="col align-items-center text-md-center">
				<h2>Наши преимущества</h2>
				<p class="advantages">Почему стоит выбрать салон кухонь «Мозаика»</p>
				<img src="<?php echo get_template_directory_uri(); ?>/img/ico/section-title-dec.svg" class="mb-5">
				
				<div class="row">
					<div class="col-lg-6 mb-4">
						<div class="row">
							<div class="col-3 col-md-2">
								<img src="<?php echo get_template_directory_uri(); ?>/img/ico/measurement-ico.svg" class="img-fluid">
							</div>
							<div class="col-9 col-md-10">
								<h3 class="advantage-title text-start">Замер и дизайн-проект бесплатно</h3>
								<p class="text-start">При заключении договора наш специалист бесплатно сделает замер и разработает дизайн-проект любого предмета мебели.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb-4">
						<div class="row">
							<div class="col-3 col-md-2">
								<img src="<?php echo get_template_directory_uri(); ?>/img/ico/section-advantage-ico.svg" class="img-fluid">
							</div>
							<div class="col-9 col-md-10">
								<h3 class="advantage-title text-start">Высокотехнологичное производство</h3>
								<p class="text-start">Вся наша мебель изготавливаются на современном оборудовании фабрики Cucina, что позволяет гарантировать нам высочайшее качество каждого изделия.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb-4">
						<div class="row">
							<div class="col-3 col-md-2">
								<img src="<?php echo get_template_directory_uri(); ?>/img/ico/advantage-guarantee-ico.svg" class="img-fluid">
							</div>
							<div class="col-9 col-md-10">
								<h3 class="advantage-title text-start">Гарантия 2 года</h3>
								<p class="text-start">Мы даем максимальную гарантию на свою мебель, т.к. уверены в профессионализме своих сотрудников и используемых материалах.</p>
							</div>	
						</div>
					</div>
					<div class="col-lg-6 mb-4">
						<div class="row">
							<div class="col-3 col-md-2">
								<img src="<?php echo get_template_directory_uri(); ?>/img/ico/discount-ico.svg" class="img-fluid">
							</div>
							<div class="col-9 col-md-10">
								<h3 class="advantage-title text-start">Скидка +10% при повторном обращении</h3>
								<p class="text-start">Мы изготавливаем любую корпусную мебель, а значит Вы можете заказать у нас кухню, шкаф, прихожую или другую мебель в квартиру в едином стиле по выгодной цене.</p>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Advantage section -->


<?php include 'footer-1.php'; ?>