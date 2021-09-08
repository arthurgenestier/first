# Mettre en place des menu de navigation dans WordPress

Dans WordPress, on peut créer plusieurs menus et plusieurs emplacements de menu.
On peut ensuite associer chaque menu à chaque emplacement librement depuis le back-office.

1. Les emplacements de menu sont déclarés dans `functions.php`
  
  ```php
  register_nav_menu('identifiant-de-lemplacement1', 'Description emplacement 1');
  register_nav_menu('identifiant-de-lemplacement2', 'Description emplacement 2');
  ```

2. Les menus sont configurés et associables à des emplacements depuis le back-office.

3. Les emplacements de menu sont ensuite "affichables" dans les thèmes (templates, par exemple `header.php`) grace à la fonction `wp_nav_menu()`
  
  ```php
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
  ```
