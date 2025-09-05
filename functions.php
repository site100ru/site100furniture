<?php
	
	/*** MENU ***/
	/* Bootstrap 5 wp_nav_menu walker */
	class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu {
		private $current_item;
		private $dropdown_menu_alignment_values = [
			'dropdown-menu-start',
			'dropdown-menu-end',
			'dropdown-menu-sm-start',
			'dropdown-menu-sm-end',
			'dropdown-menu-md-start',
			'dropdown-menu-md-end',
			'dropdown-menu-lg-start',
			'dropdown-menu-lg-end',
			'dropdown-menu-xl-start',
			'dropdown-menu-xl-end',
			'dropdown-menu-xxl-start',
			'dropdown-menu-xxl-end'
		];

		function start_lvl(&$output, $depth = 0, $args = null) {
			$dropdown_menu_class[] = '';
			foreach($this->current_item->classes as $class) {
				if(in_array($class, $this->dropdown_menu_alignment_values)) {
					$dropdown_menu_class[] = $class;
				}
			}
			$indent = str_repeat("\t", $depth);
			$submenu = ($depth > 0) ? ' sub-menu' : '';
			$output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
		}

		function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
			
			$this->current_item = $item;

			$indent = ($depth) ? str_repeat("\t", $depth) : '';

			$li_attributes = '';
			$class_names = $value = '';

			$classes = empty($item->classes) ? array() : (array) $item->classes;

			$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
			$classes[] = 'nav-item';
			$classes[] = 'nav-item-' . $item->ID;
			if ($depth && $args->walker->has_children) {
				$classes[] = 'dropdown-menu dropdown-menu-end';
			}

			$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
			$class_names = ' class="' . esc_attr($class_names) . '"';

			$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
			$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
			
			
			$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';


			$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
			$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
			$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
			$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

			$active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
			$nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
			$attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

			$item_output = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
			
			// Показываем точки в меню, первый вариант
			$item_title = $item->title;
			$dropdown = in_array( 'dropdown', $classes );
			if ( $item_title == 'Контакты' ) {
				$output .= '
					<li class="nav-item d-none">
						<span class="nav-link">
							<img src="'.get_template_directory_uri().'/img/ico/menu-decoration-point.svg" alt="">
						</span>
					</li>
				';
			} else if ( $dropdown == false AND $depth == 0 ) {
				$output .= '
					<li class="nav-item d-none d-xl-inline">
						<span class="nav-link">
							<img src="'.get_template_directory_uri().'/img/ico/menu-decoration-point.svg" alt="">
						</span>
					</li>
				';
			}
		}
	}
	/* End Bootstrap 5 wp_nav_menu walker */
	
	
	/* Register a new menu */
	add_action( 'after_setup_theme', function() {
		register_nav_menus( [
			'main-menu' => 'Main menu',
			'mobail-header-collapse' => 'Mobail header collapse',
			'sliding-header-collapse' => 'Sliding header collapse',
			'contacts-desktop-menu' => 'Contacts desktop menu',
			'navbarSupportedContent2' => 'navbarSupportedContent2'
		] );
	} );
	/* End register a new menu */
	/*** END MENU ***/
	
	
	
	/* WooCommerce support */
	add_action( 'after_setup_theme', 'furniture_catalog_add_woocommerce_support' );
	function furniture_catalog_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	
	
	/* Изменяем размер миниатюр WooCommerce */
	add_filter('woocommerce_get_image_size_thumbnail','add_thumbnail_size',1,10);
	function add_thumbnail_size($size){
		$size['width'] = 600;
		$size['height'] = 400;
		$size['crop']   = 1; //0 - не обрезаем, 1 - обрезка
		return $size;
	}
	
	
	/* Отключаем ненужные опции вывода настраницу */
	/* Отключаем название товара
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	
	
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
	add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);
	add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10);
	
	
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 ); */
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	
	
	// Цена
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
	
	// Кнопка
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

	
	/* Изменям значек валюты */
	add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
	function change_existing_currency_symbol( $currency_symbol, $currency ) {
		 switch( $currency ) {
			  case 'RUB': $currency_symbol = '₽'; break;
		 }
		 return $currency_symbol;
	}
	
	
	
	/*** BREADCRUMBS DEFAULT ***/
	/* Change several of the breadcrumb defaults */
	add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
	function jk_woocommerce_breadcrumbs() {
		return array(
				'delimiter'   => ' &#47; ',
				'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a href="https://мозаика62.рф/"><img src="'.get_template_directory_uri().'/img/ico/breadcrumbs-icon.svg"></a> / ',
				'wrap_after'  => '</nav>',
				'before'      => '',
				'after'       => '',
				'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
			);
	}
	
	
	/* Убираем ссылку на главную страницу сайта в хлебных крошках, чтобы потом подставить вместо этого ссылку с изображением */
	add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );
	function wcc_change_breadcrumb_home_text( $defaults ) {
		// Change the breadcrumb home text from 'Home' to 'Apartment'
		$defaults['home'] = null;
		return $defaults;
	}
	
	
	/* Добавляем ссылку на главную страницу магазина в хлебных крошках */
	/* Изменил от первоначальной версии */
	add_filter( 'woocommerce_get_breadcrumb', function($crumbs, $Breadcrumb){
        //$shop_page_id = wc_get_page_id('shop'); //Get the shop page ID
        // Если это страница магазина, страница архива или таксономии продуктов, то добавляем впереде ссылку на страницу архива продуктов
		if ( is_post_type_archive( 'products' ) OR is_product_taxonomy( 'product-cat' ) ) { //Check we got an ID (shop page is set). Added check for is_shop to prevent Home / Shop / Shop as suggested in comments
            $new_breadcrumb = [
                _x( 'Продукция', 'breadcrumb', 'woocommerce' ), //Title
                get_permalink( wc_get_page_id( 'shop' ) ) // URL
            ];
            array_splice( $crumbs, 0, 0, [ $new_breadcrumb ] ); //Insert a new breadcrumb after the 'Home' crumb
        } else if ( is_tax( 'portfolio-cat' ) ) {
			$new_breadcrumb = [
                _x( 'Наши работы', 'breadcrumb', 'woocommerce' ), //Title
                'https://мозаика62.рф/portfolio/' // URL
            ];
            array_splice( $crumbs, 0, 1, [ $new_breadcrumb ] ); //Insert a new breadcrumb after the 'Home' crumb
		}
		return $crumbs;
    }, 10, 2 );
	
	
	/* WC 2.6.4: Изменить любой элемент "хлебных крошек" */
	add_filter( 'woocommerce_get_breadcrumb', 'my_woocommerce_get_breadcrumb' );
	function my_woocommerce_get_breadcrumb($breadcrumb) {
			
			foreach ( $breadcrumb as $key => $crumb ) {
				// заменяем "крошку" корня каталога "Каталог" на "Мой каталог"
				//if ($breadcrumb[$key][0] == 'Каталог') $breadcrumb[$key][0] = 'Мой каталог';
				// заменяем, если в "крошке" название 'Компьютеры Apple'
				if ($breadcrumb[$key][0] == 'Наша продукция') $breadcrumb[$key][0] = 'Продукция';
			}
			
		return $breadcrumb;
	}
	/*** END BREADCRUMBS DEFAULT ***/
	
	
	
	// Register taxonomy
	add_action( 'init', 'create_taxonomy' );
	function create_taxonomy() {
		
		// Таксономия - портфолио
		register_taxonomy( 'portfolio-cat', [ 'portfolio' ], [
			'label'                 => '', // определяется параметром $labels->name
			'labels'                => [
				'name'              => 'Наши работы',
				'singular_name'     => 'Категория портфолио',
				'search_items'      => 'Искать категорию портфолио',
				'all_items'         => 'Все категории портфолио',
				'view_item '        => 'View Genre',
				'parent_item'       => 'Parent Genre',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Edit Genre',
				'update_item'       => 'Update Genre',
				'add_new_item'      => 'Add New Genre',
				'new_item_name'     => 'New Genre Name',
				'menu_name'         => 'Категории портфолио',
				'back_to_items'     => '← Вернуться к категориям портфолио',
			],
			'description'           => '', // описание таксономии
			'public'                => true,
			// 'publicly_queryable'    => null, // равен аргументу public
			// 'show_in_nav_menus'     => true, // равен аргументу public
			// 'show_ui'               => true, // равен аргументу public
			// 'show_in_menu'          => true, // равен аргументу show_ui
			// 'show_tagcloud'         => true, // равен аргументу show_ui
			// 'show_in_quick_edit'    => null, // равен аргументу show_ui
			'hierarchical'          => true,
			'rewrite'               => true,
			//'query_var'             => $taxonomy, // название параметра запроса
			'capabilities'          => array(),
			'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
			'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
			'show_in_rest'          => null, // добавить в REST API
			'rest_base'             => null, // $taxonomy
			// '_builtin'              => false,
			//'update_count_callback' => '_update_post_term_count',
		] );
	}
	
	
	// Register post type
	add_action( 'init', 'register_post_types' );
	function register_post_types() {
		
		// Add thumbnails
		add_theme_support('post-thumbnails');
		
		// Тип записи - наши работы (портфолио)
		register_post_type( 'portfolio', [
			'label'  => null,
			'labels' => [
				'name'               => 'Наши работы', // основное название для типа записи
				'singular_name'      => 'Наши работы', // название для одной записи этого типа
				'add_new'            => 'Добавить нашу работу', // для добавления новой записи
				'add_new_item'       => 'Добавление нашей работы', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование нашей работы', // для редактирования типа записи
				'new_item'           => 'Новая наша работа', // текст новой записи
				'view_item'          => 'Смотреть нашу работу', // для просмотра записи этого типа.
				'search_items'       => 'Искать нашу работу', // для поиска по этим типам записи
				'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Наши работы', // название меню
			],
			'description'         => '',
			'public'              => true,
			// 'publicly_queryable'  => null, // зависит от public
			// 'exclude_from_search' => null, // зависит от public
			// 'show_ui'             => null, // зависит от public
			// 'show_in_nav_menus'   => null, // зависит от public
			'show_in_menu'        => null, // показывать ли в меню адмнки
			// 'show_in_admin_bar'   => null, // зависит от show_in_menu
			'show_in_rest'        => null, // добавить в REST API. C WP 4.7
			'rest_base'           => null, // $post_type. C WP 4.7
			'menu_position'       => null,
			'menu_icon'           => null,
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor' ], // 'title','editor','author','trackbacks','comments', 'thumbnail', 'custom-fields','revisions','page-attributes','post-formats', 'excerpt'
			'taxonomies'          => [ 'portfolio-cat' ],
			'has_archive'         => true,
			'rewrite'             => true,
			'query_var'           => true,
		] );
	}
	
	
	
	/* Wijet область в сайдбаре */
	if ( function_exists( 'register_sidebar' ) ) {
		register_sidebar(
			array(
				'name'          => 'Виджет в сайдбаре', //название виджета в админ-панели
				'id'            => 'wsidebar-1', //идентификатор виджета
				'description'   => 'виден во всех разделах сайта', //описание виджета в админ-панели
				'before_widget' => '<aside id="%1$s" class="widget %2$s">', //открывающий тег виджета с динамичным идентификатором
				'after_widget'  => '<div class="clear"></div></aside>', //закрывающий тег виджета с очищающим блоком
				'before_title'  => '<span class="widget-title">', //открывающий тег заголовка виджета
				'after_title'   => '</span>',//закрывающий тег заголовка виджета
			)
		);
	}
	
	
	
	// Подключаем функцию активации мета блока (my_extra_fields)
	add_action('add_meta_boxes', 'my_extra_fields', 1);

	function my_extra_fields() {
		add_meta_box( 'extra_fields', 'Галерея наших работ', 'extra_fields_box_func', 'portfolio', 'side', 'high' );
	}

	/* Код блока галереи */
	function extra_fields_box_func( $post ){
		for ($i=1; $i<=9; $i++) { ?>
			<label>URL&#160;изображения <?php echo $i; ?>:</label>
			<input type="text" name="extra[img-<?php echo $i; ?>]" value="<?php echo get_post_meta($post->ID, '_img-'.$i, 1); ?>" style="width: 100%;">
			<div style="clear: both;"></div>
		<? } ?>
			<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
		<?php
	}
	
	// включаем обновление полей при сохранении
	add_action( 'save_post', 'my_extra_fields_update', 0 );

	## Сохраняем данные, при сохранении поста
	function my_extra_fields_update( $post_id ){
		// базовая проверка
		if (
			   empty( $_POST['extra'] )
			|| ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
			|| wp_is_post_autosave( $post_id )
			|| wp_is_post_revision( $post_id )
		)
			return false;

		// Все ОК! Теперь, нужно сохранить/удалить данные
		//$_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // чистим все данные от пробелов по краям
		foreach( $_POST['extra'] as $key => $value ){
			if( empty($value) ){
				delete_post_meta( $post_id, '_'.$key ); // удаляем поле если значение пустое
				continue;
			}
			update_post_meta( $post_id, '_'.$key, $value ); // add_post_meta() работает автоматически
		}
		return $post_id;
	}
	
	
	
	
	/*** ДОБАВЛЯЕМ ВОЗМОЖНОСТЬ В НАСТРОЙКАХ ТЕМЫ ДОБАВИТЬ КОНТАКТЫ И КОД СЧЕТЧИКА ***/
	function mytheme_customize_register( $wp_customize ) {
		// Добавляем секцию
		$wp_customize->add_section( 'mytheme_analytics', array(
			'title'    => 'Аналитика и счетчики',
			'priority' => 200,
		));

		// Поле для кода счетчика (head)
		$wp_customize->add_setting( 'mytheme_counter_head', array(
			'default'   => '',
			'transport' => 'postMessage',
		));

		$wp_customize->add_control( 'mytheme_counter_head', array(
			'label'       => 'Код счетчика (в <head>)',
			'description' => 'Вставьте код, который должен быть в <head> (например, Google Analytics, Meta Pixel)',
			'section'     => 'mytheme_analytics',
			'type'        => 'textarea',
		));

		// Поле для кода счетчика (body)
		$wp_customize->add_setting( 'mytheme_counter_body', array(
			'default'   => '',
			'transport' => 'postMessage',
		));

		$wp_customize->add_control( 'mytheme_counter_body', array(
			'label'       => 'Код счетчика (перед </body>)',
			'description' => 'Вставьте код, который должен быть перед закрывающим тегом </body> (например, Яндекс.Метрика)',
			'section'     => 'mytheme_analytics',
			'type'        => 'textarea',
		));
		
		
		/** ИСПОЛЬЗУЕМ ВЛОЖЕННЫЕ КОНТЕЙНЕРЫ **/
		/* КОНТАКТЫ */
		// Создаем панель (родительский контейнер)
		$wp_customize->add_panel( 'contact_panel', array(
			'title'       => 'Контакты',
			'description' => 'Описание контактов',
			'priority'    => 205, // Чем меньше, тем выше в списке
		) );
		
			// Добавляем первую вложенную секцию (Основной номер телефона)
			$wp_customize->add_section( 'mytheme_contacts', array( 
				'title'    => 'Основной номер телефона',
				'panel'    => 'contact_panel', // Указываем родительскую панель
				'priority' => 5
			));
		
				// Добавляем поле для ввода КОДА СТРАНЫ основного номера телефона
				$wp_customize->add_setting( 'mytheme_main_phone_country_code', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
			
				$wp_customize->add_control( 'mytheme_main_phone_country_code', array(
					'label'       => 'Код страны',
					'description' => 'Например: 8 или +7',
					'section'     => 'mytheme_contacts',
					'type'        => 'input',
					'input_attrs' => array(
						'placeholder' => '',
						'style'      => 'width: 60px; display: inline-block;', // Уменьшаем ширину и делаем в одну строку
					)
				));
		
				// Добавляем поле для ввода КОДА РЕГИОНА основного номера телефона
				$wp_customize->add_setting( 'mytheme_main_phone_region_code', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
			
				$wp_customize->add_control( 'mytheme_main_phone_region_code', array(
					'label'       => 'Код региона',
					'description' => 'Например: 800, без скобок',
					'section'     => 'mytheme_contacts',
					'type'        => 'input',
					'input_attrs' => array(
						'placeholder' => '',
						'style'      => 'width: 60px; display: inline-block;', // Уменьшаем ширину и делаем в одну строку
					)
				));
		
				// Добавляем поле для ввода основного НОМЕРА ТЕЛЕФОНА
				$wp_customize->add_setting( 'mytheme_main_phone_number', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
				
				$wp_customize->add_control( 'mytheme_main_phone_number', array(
					'label'       => 'Номер телефона',
					'description' => 'Например: 880-80-88',
					'section'     => 'mytheme_contacts',
					'type'        => 'input',
					'input_attrs' => array(
						'placeholder' => '',
						'style'      => 'width: 100px; display: inline-block;', // Уменьшаем ширину и делаем в одну строку
					)
				));
				
				
			// Добавляем вложенную секцию ДОПОЛНИТЕЛЬНОГО НОМЕРА ТЕЛЕФОНА
			$wp_customize->add_section( 'additional_phone_number', array( 
				'title'    => 'Дополнительный номер телефона',
				'panel'    => 'contact_panel', // Указываем родительскую панель
				'priority' => 5
			));
		
				/* Добавляем поле для ввода КОДА СТРАНЫ дополнительного номера телефона */
				$wp_customize->add_setting( 'additional_phone_country_code', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
			
				$wp_customize->add_control( 'additional_phone_country_code', array(
					'label'       => 'Код страны',
					'description' => 'Например: 8 или +7',
					'section'     => 'additional_phone_number',
					'type'        => 'input',
					'input_attrs' => array(
						'placeholder' => '',
						'style'      => 'width: 60px; display: inline-block;', // Уменьшаем ширину и делаем в одну строку
					)
				));
		
				/* Добавляем поле для ввода КОДА РЕГИОНА дополнительного номера телефона */
				$wp_customize->add_setting( 'additional_phone_region_code', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
			
				$wp_customize->add_control( 'additional_phone_region_code', array(
					'label'       => 'Код региона',
					'description' => 'Например: 800, без скобок',
					'section'     => 'additional_phone_number',
					'type'        => 'input',
					'input_attrs' => array(
						'placeholder' => '',
						'style'      => 'width: 60px; display: inline-block;', // Уменьшаем ширину и делаем в одну строку
					)
				));
		
				// Добавляем поле для ввода дополнительного НОМЕРА ТЕЛЕФОНА
				$wp_customize->add_setting( 'additional_phone_number', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
				
				$wp_customize->add_control( 'additional_phone_number', array(
					'label'       => 'Номер телефона',
					'description' => 'Например: 880-80-88',
					'section'     => 'additional_phone_number',
					'type'        => 'input',
					'input_attrs' => array(
						'placeholder' => '',
						'style'      => 'width: 100px; display: inline-block;', // Уменьшаем ширину и делаем в одну строку
					)
				));
		
		
			// Добавляем вторую вложенную секцию (Email)
			$wp_customize->add_section( 'mytheme_contacts_email', array( 
				'title'    => 'Email',
				'panel'    => 'contact_panel', // Указываем родительскую панель
				'priority' => 5
			));
		
				// Добавляем поле для ввода email
				$wp_customize->add_setting( 'mytheme_email', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
				
				$wp_customize->add_control( 'mytheme_email', array(
					'label'       => 'Email',
					//'description' => 'Например: 8 или +7',
					'section'     => 'mytheme_contacts_email',
					'type'        => 'input',
					'input_attrs' => array(
						'placeholder' => '',
						//'style'      => 'width: 60px; display: inline-block;', // Уменьшаем ширину и делаем в одну строку
					)
				));
				
				
			// Добавляем вложенную секцию для Telegram
			$wp_customize->add_section( 'mytheme_contacts_telegram', array( 
				'title'    => 'Telegram',
				'panel'    => 'contact_panel', // Указываем родительскую панель
				'priority' => 5
			));
		
				// Добавляем поле для ввода Telegram
				$wp_customize->add_setting( 'mytheme_telegram', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
				
				$wp_customize->add_control( 'mytheme_telegram', array(
					'label'       => 'Telegram',
					'description' => 'Укажите ссылку на Telegram',
					'section'     => 'mytheme_contacts_telegram',
					'type'        => 'input',
					'input_attrs' => array(
						'placeholder' => '',
						//'style'      => 'width: 60px; display: inline-block;', // Уменьшаем ширину и делаем в одну строку
					)
				));
		
		
			// Добавляем третью вложенную секцию (Whatsapp)
			$wp_customize->add_section( 'mytheme_contacts_whatsapp', array( 
				'title'    => 'Whatsapp',
				'panel'    => 'contact_panel', // Указываем родительскую панель
				'priority' => 5
			));
		
				// Добавляем поле для ввода whatsapp
				$wp_customize->add_setting( 'mytheme_whatsapp', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
				
				$wp_customize->add_control( 'mytheme_whatsapp', array(
					'label'       => 'Whatsapp',
					'description' => 'Укажите ссылку на Whatsapp',
					'section'     => 'mytheme_contacts_whatsapp',
					'type'        => 'input',
					'input_attrs' => array(
						'placeholder' => '',
						//'style'      => 'width: 60px; display: inline-block;', // Уменьшаем ширину и делаем в одну строку
					)
				));
			
			
			// Добавляем секцию Вконтакте
			$wp_customize->add_section( 'mytheme_contacts_vk', array( 
				'title'    => 'Вконтакте',
				'panel'    => 'contact_panel', // Указываем родительскую панель
				'priority' => 5
			));
		
				// Добавляем поле для ввода Вконтакте
				$wp_customize->add_setting( 'mytheme_vk', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
				
				$wp_customize->add_control( 'mytheme_vk', array(
					'label'       => 'Вконтакте',
					'description' => 'Укажите ссылку на Вконтакте',
					'section'     => 'mytheme_contacts_vk',
					'type'        => 'input'
				));
				
				
			// Добавляем секцию Адрес
			$wp_customize->add_section( 'mytheme_contacts_address', array( 
				'title'    => 'Адрес',
				'panel'    => 'contact_panel', // Указываем родительскую панель
				'priority' => 5
			));
		
				// Добавляем поле для ввода Вконтакте
				$wp_customize->add_setting( 'mytheme_address', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
				
				$wp_customize->add_control( 'mytheme_address', array(
					'label'       => 'Адрес',
					'description' => 'Укажите адрес организации',
					'section'     => 'mytheme_contacts_address',
					'type'        => 'input'
				));
				
				
			// Добавляем секцию «Время работы»
			$wp_customize->add_section( 'mytheme_contacts_job_time', array( 
				'title'    => 'Время работы',
				'panel'    => 'contact_panel', // Указываем родительскую панель
				'priority' => 5
			));
		
				// Добавляем поле для ввода Вконтакте
				$wp_customize->add_setting( 'mytheme_job_time', array(
					'default'   => '',
					'transport' => 'postMessage',
				));
				
				$wp_customize->add_control( 'mytheme_job_time', array(
					'label'       => 'Время работы',
					'description' => 'Укажите время работы',
					'section'     => 'mytheme_contacts_job_time',
					'type'        => 'input'
				));
		/** ИСПОЛЬЗУЕМ ВЛОЖЕННЫЕ КОНТЕЙНЕРЫ **/
	}
	add_action( 'customize_register', 'mytheme_customize_register' );
	/*** END ДОБАВЛЯЕМ ВОЗМОЖНОСТЬ В НАСТРОЙКАХ ТЕМЫ ДОБАВИТЬ КОНТАКТЫ И КОД СЧЕТЧИКА ***/
	
	
	
	
	// Включаем Excerpt для страниц
	add_action('init', 'add_excerpt_to_pages');
	function add_excerpt_to_pages() {
		add_post_type_support('page', 'excerpt');
	}
	
	
	
	
	/*** ДЕЛАЕМ ПРАВИЛЬНЫЙ DESCRIPTION ДЛЯ КАЖДОЙ СТРАНИЦЫ ***/
	function echo_description() {
		
		// Если страница стандартной категории поста
		if ( is_category() ) {
			echo wp_strip_all_tags( category_description() );
		
		// Если страница продукта woocommerce
		} elseif ( is_product() ) {
			$product = wc_get_product( get_the_ID() ); 
			$short_description = $product->get_short_description();
			echo wp_strip_all_tags( $short_description );
		
		// Если страница категории продукта woocommerce
		} elseif ( is_product_category() ) {
			foreach( wp_get_post_terms( get_the_id(), 'product_cat' ) as $term ){
				if( $term ){
					//echo $term->name . '<br>'; // product category name
					if ( $term->description ) {
						echo $term->description; // Product category description
					}
				}
			}
		
		// Если страница портфолио
		} elseif ( is_post_type_archive( 'portfolio' ) ) {
			echo 'Портфолио';
		
		// Если страница категорий портфолио
		} elseif ( is_tax( 'portfolio-cat' ) ) {
			$term = get_queried_object(); // Получаем текущий термин
			echo $term->description;
			//echo 'Категория портфолио';
		
		// Если страница магазина	
		} elseif ( is_shop() ) {
			$shop_page_id = wc_get_page_id('shop');
			echo get_the_excerpt($shop_page_id);
		
		// Если обычная страница
		} else {
			echo get_the_excerpt();
		}
	}
	/*** END ДЕЛАЕМ ПРАВИЛЬНЫЙ DESCRIPTION ДЛЯ КАЖДОЙ СТРАНИЦЫ ***/
	
	
	
	
	/*** ДЕЛАЕМ ФАЙЛ ROBOTS.TXT ***/
	/* Работает только для основного сайта на домене */
	add_filter('robots_txt', 'custom_robots_txt');
	function custom_robots_txt($output) {
		$output = "User-agent: *\n";
		$output .= "Disallow: *?add-to-cart=*\n";
		return $output;
	}
	/*** END ДЕЛАЕМ ФАЙЛ ROBOTS.TXT ***/
	
	
	
	
	/*** ОБНОВЛЕНИЕ THEME ***/
	add_filter('pre_set_site_transient_update_themes', 'check_furniture_updates');

	function check_furniture_updates($transient) {
		$theme_slug = 'furniture'; // Имя папки темы
		$current_version = wp_get_theme()->get('Version');
		$update_server = 'https://site100.ru/wp-themes/furniture/furniture-updates.json';

		// Запрос к вашему серверу
		$response = wp_remote_get($update_server);

		if (!is_wp_error($response)) {
			$update_data = json_decode(wp_remote_retrieve_body($response));

			if (
				$update_data &&
				version_compare($current_version, $update_data->version, '<') &&
				!empty($update_data->download_url)
			) {
				$transient->response[$theme_slug] = array(
					'theme'       => $theme_slug,
					'new_version' => $update_data->version,
					'package'     => $update_data->download_url,
					'url'         => 'https://site100.ru/wp-themes/furniture/changelog' // Опционально
				);
			}
		}
		
		return $transient;
	}
	
	
	
	add_action('admin_init', 'force_transient_refresh');
	function force_transient_refresh() {
		delete_site_transient('update_themes');
		wp_clean_themes_cache();
		wp_update_themes(); // Запуск проверки обновлений
	}
	/*** END ОБНОВЛЕНИЕ THEME ***/
	
?>