<?php
/**
 * Functions
 *
 * @package blogintegrally
 */

/* prise en charge des images mises en avant */
add_theme_support( 'post-thumbnails' );

/* laisser à WordPress la gestion de la balise <title> */
add_theme_support( 'title-tag' );

/* Emplacement de menu (header) */
register_nav_menu( 'main-menu', 'Menu principal (bloc de gauche)' );

/* Emplacement de menu (footer) */
register_nav_menu( 'footer-menu', 'Menu bas de page (bloc de droite)' );

/*
Ici, on va laisser WordPress se charger de l'insertion des styles et des scripts (JS)
on englobe ça dans une fonction (une boite)...
*/

/**
 * Ici, on va laisser WordPress se charger de l'insertion des styles et des scripts (JS)... on englobe ça dans une fonction (une boite)...
 *
 * @return void
 */
function blogintegrally_enqueue_styles_and_scripts() {
	wp_enqueue_style( 'main-style', get_theme_file_uri( 'assets/css/style.css' ), array(), '1.0' );
}

// ...que l'on ouvre uniquement lorsque l'on est sur le front (sur un hook, sur un point d'accroche spécifique)
add_action( 'wp_enqueue_scripts', 'blogintegrally_enqueue_styles_and_scripts' );

/**
 * Cette fonction va nous permettre de modifier les classes des items de menus gérés par WordPress
 *
 * @param string[] $classes Array of the CSS classes that are applied to the menu item's <li> element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return $classes
 */
function blogintegrally_menu_item_class( $classes, $item, $args ) {

	/* si l'emplacement de menu traité est 'main-menu' */
	if ( 'main-menu' === $args->theme_location ) {
		/* On définit un tableau $classes (qui peut contenir plusieurs class) avec la class 'menu__item'*/
		$classes = array( 'menu__item' );
		/* Sinon si l'emplacelent de menu traité est 'footer-menu'*/
	} elseif ( 'footer-menu' === $args->theme_location ) {
		/* on définit une class différente pour les items */
		$classes = array( 'footer-links__item' );
	}

	return $classes; /* on va retourner ce tableau (pour que WordPress l'utilise dans sa génération de code) */
}

/*
La fonction add_filter() permet de modifier le comportement de WordPress
ci-dessous, on modifie le comportement de la fonction wp_nav_menu()
on "demande" à cette fonction d'ajouter une class ('menu_item') au moment ou il génère ses items de menu
*/
add_filter( 'nav_menu_css_class', 'blogintegrally_menu_item_class', 10, 3 );

/**
 * Permet de charger les fichiers de traduction depuis le repertoire "languages" du thème blog integrally
 */
function blog_integrally_load_theme_textdomain() {
	load_theme_textdomain( 'blog-integrally', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'blog_integrally_load_theme_textdomain' );
