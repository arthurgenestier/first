<!DOCTYPE html>
<?php // https://developer.wordpress.org/reference/functions/language_attributes/ 
?>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>

	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_theme_file_uri('assets/images/favicon-32x32.png'); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_theme_file_uri('assets/images/favicon-16x16.png'); ?>">
	<?php
	// https://developer.wordpress.org/reference/functions/get_theme_file_uri/
	// cette fonction permet de retrouver l'URL vers le dossier du thème courant
	// ci-dessous, on l'utilise pour retrouver dynamiquement nos assets css
	// ici, besoin d'afficher avec "echo" car la fonction "Retrieves"
	?>

	<link rel="stylesheet" href="<?php echo get_theme_file_uri('assets/css/normalize.css'); ?>" />
	<link rel="stylesheet" href="<?php echo get_theme_file_uri('assets/css/style.css'); ?>" />

	<?php
	// wp_head() permet en gros à WordPress d'incorporer du code dont il a besoin pour fonctionner correctement
	// à positionner juste avant la fermeture de head
	wp_head();
	?>

</head>

<body>
	<header role="banner">
		<div class="top">
			<a href="#main-content">Aller au contenu</a>
			<button type="button" class="button switch-theme">Thème sombre</button>
		</div>

		<?php

		// https://developer.wordpress.org/reference/functions/bloginfo/
		// ici, pas besoin d'afficher avec "echo" car la fonction "Display"

		?>
		<h1 class="logo"><?php bloginfo('name'); ?></h1>
		<!-- <nav role="navigation" aria-label="Menu de navigation principal">
			<ul>
				<li><a href="" aria-current="current">Accueil</a></li>
				<li><a href="">Catégorie 1</a></li>
				<li><a href="">Catégorie 2</a></li>
				<li><a href="">Catégorie 3</a></li>
				<li><a href="">Catégorie 4</a></li>
			</ul>
		</nav> -->
		<?php
		/*
		/!\ Les menus de navigation générés de base par WordPress ne sont pas complètement accessibles
		Un menu de navigation accessible c'est :
		- une <nav> avec un role="navigation" (pas de base)
		- une liste avec des liens
		- des items actifs avec aria-current="page" + distiction forme et couleur + éventuellement pas de lien
		- la version responsive (burger) doit contenir le texte "Menu" en plus de l'icone
		*/
		?>
		<nav role="navigation" aria-label="Menu de navigation principal">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'main-menu', /* identifiant de l'emplacement de menu à afficher */
				'container'      => false, /* supprimer le container (on s'en occupe dans le code HTML) */
				'menu_class'     => 'class-du-menu' /* juste pour l'exemple (ne sert à rien ici) : permet d'ajouter une class au <ul> */
			)
		);
		?>
		</nav>
	</header>