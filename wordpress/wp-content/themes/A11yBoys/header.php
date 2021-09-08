<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>

</head>

<body>
    <header role="banner" id="header">

        <div class="skip-link">
            <a href="#main" class="link-arrow" title="Lien vers le contenu principal">Aller au contenu</a>
        </div>
        <div class="header-inner">
            <a href="<?php bloginfo('url'); ?>"><img src="<?= get_theme_file_uri( 'assets/images/logo_a11yboys.png' ); ?>" class="header-inner__logo" alt="Logo du groupe A11y boys" height="50px" width="auto" /></a>            
        </div>

        <nav role="navigation" aria-label="Menu principal" class="main-nav" id="main-navbar">
            <button class="header-inner__button" id="main-menu-button" type="button">
                <img class="header-inner__icon" src="<?= get_theme_file_uri( 'assets/images/icones/burger.svg' ); ?>" alt="Bouton du Menu principal">  
                <span class="">Menu</span>  
            </button>

            <div class="menu-main--mobile" id="main-nav--mobile">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu--mobile', /* identifiant de l'emplacement de menu à afficher */
                            'container'      => false, /* supprimer le container (on s'en occupe dans le code HTML) */
                            'menu_class'     => 'menu__list' /* juste pour l'exemple (ne sert à rien ici) : permet d'ajouter une class au <ul> */
                        )
                    );
                ?>    
            </div>

            <div class="menu-main--desktop" id="main-nav--desktop">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu--desktop', /* identifiant de l'emplacement de menu à afficher */
                            'container'      => false, /* supprimer le container (on s'en occupe dans le code HTML) */
                            'menu_class'     => 'menu__list' /* juste pour l'exemple (ne sert à rien ici) : permet d'ajouter une class au <ul> */
                        )
                    );
                ?>
            </div>
        </nav>
         
    </header>

    <main role="main" id="main">