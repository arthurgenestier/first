<?php
/**
 * Header
 *
 * @package blogintegrally
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body>
	<div class="wrapper">
		<header class="left" role="banner">
			<div class="screen-reader-text">
				<a href="#main"><?php esc_html_e( 'Aller au contenu', 'blog-integrally' ); ?></a>
			</div>
			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<div class="introduction">
			<h2 class="introduction__title">
				<?php
				/* translators: %s: open span tag */
				printf( esc_html__( 'Dernières nouveautés %s de nos étudiants', 'blog-integrally' ), '<span class="introduction__subtitle">' );
				?>
				</span>
			</h2>
				<p class="introduction__text">
				<?php esc_html_e( 'Le but de ce blog est de permettre aux étudiants de la formation Intégra11y de partager leurs sentiments, leurs hauts et leurs bas, leurs succès et leurs échecs, et ce, tout au long de la formation et même après.', 'blog-integrally' ); ?>
				</p>
			</div>
			<nav class="menu" role="navigation" aria-label="Menu de navigation principal">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu', /* identifiant de l'emplacement de menu à afficher */
						'container'      => false, /* supprimer le container (on s'en occupe dans le code HTML) */
						'menu_class'     => 'menu__list', /* permet d'ajouter une class au <ul> */
					)
				);
				?>
			</nav>
		</header>
		<div class="right">
			<main role="main" id="main">
