<?php
	
	session_start();
	
	if ( isset( $_SESSION['win'] ) ) {
		unset( $_SESSION['win'] );
		$_SESSION['display'] = "block";
	} else { $_SESSION['display'] = "none"; }
	
?>


<!DOCTYPE html>
<html lang="ru">
	<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900">
		<meta name="description" content="<?php echo_description(); ?>" />
		<meta property="og:description" content="<?php echo_description(); ?>" />
		<meta name="keywords" content="<?php echo wp_get_document_title(); ?>" />
		<meta property="og:locale" content="ru_RU" />
		<meta property="og:type" content="website" />
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
		<meta property="og:title" content="<?php echo wp_get_document_title(); ?>" />
		
		<!-- Bootstrap CSS -->
		<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Style CSS -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/theme.css">
		
		<!-- Quiz CSS -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/quiz.css">
		
		<!-- Style CSS -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
		
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/ico/favicon-light-1.svg" type="image/x-icon" id="favicon">
		
		<title><?php echo wp_get_document_title(); ?></title>
		
		<?php if ( $counter_head = get_theme_mod( 'mytheme_counter_head' ) ) : ?>
			<!-- Код счетчика (head) -->
			<?php echo $counter_head; ?>
		<?php endif; ?>
	</head>
	<body>