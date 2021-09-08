<?php

// dans l'ideal, avant d'appliquer la fonction on vérifie si elle n'a pas déjà était appellée ailleurs, pas beaucoup d'incidence sur un petit projet comme le votre, mais c'est une bonne pratique quand on travail à plusieurs mains sur un projet, pour éviter d'écraser ce que quelqu'un d'autre aurait pu faire.
if( ! function_exists( 'a11yboys_enqueue_styles_and_scripts') ) {
    function a11yboys_enqueue_styles_and_scripts(){
        wp_enqueue_style( 'main-style', get_theme_file_uri( 'assets/css/style.css' ) );
        wp_enqueue_script('main-script', get_theme_file_uri( 'assets/js/javascript.js' ), [], '', true );
    };
}

add_action( 'wp_enqueue_scripts', 'a11yboys_enqueue_styles_and_scripts' );

function a11boys_theme_setup()
{
    // on écrit rien dans functions.php sans le mettre dans une fonction appellée par une action ou un filtre, sinon wordpress applique tout ca en meme temps et pas forcement au moment voulu
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'a11boys_theme_setup' );

/**
* Register menus
* C'est bien aussi d'ajouter des commentaires pour savoir quelle fonction fait quoi
* Vous serez super content d'avoir ces commentaires quand vous reprendrez le code pour votre dossier de projet pour la certification
*/
function a11yboys_register_menus()
{
    register_nav_menu( 'main-menu--desktop', 'Menu principal desktop' );
    register_nav_menu('main-menu--mobile', 'Menu principal mobile');
    register_nav_menu('footer-menu', 'Menu footer');
}
add_action( 'init', 'a11yboys_register_menus' );



function a11yboys_menu_item_class( $classes, $item, $args ) {

    if ( $args -> theme_location ==='main-menu' ) {
        $classes = ['menu__item'];
    }

    else if ( $args -> theme_location === 'footer-menu' ) {
        $classes = ['footer-links__item'];
    }

    $classes = ['menu__item'];

    return $classes;
}

add_filter( 'nav_menu_css_class', 'a11yboys_menu_item_class', 10, 3 );

?>