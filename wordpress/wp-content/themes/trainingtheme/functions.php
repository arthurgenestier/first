<?php

// le fichier functions.php permet de modifier / ajouter des fonctionnalités du thème

// permet d'utiliser les images mises en avant (articles et pages) dans le thème
add_theme_support('post-thumbnails');

/* ici, on déclare un emplacement de menu pour notre menu principal */
register_nav_menu('main-menu', 'Menu principal affiché dans le header');