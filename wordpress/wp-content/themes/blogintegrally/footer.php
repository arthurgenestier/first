<?php
/**
 * Footer
 *
 * @package blogintegrally
 */

?>
</main>

<footer role="contentinfo">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'footer-menu', /* identifiant de l'emplacement de menu à afficher */
			'container'      => false, /* supprimer le container (on s'en occupe dans le code HTML) */
			'menu_class'     => 'footer-links', /* permet d'ajouter une class au <ul> */
		)
	);
	?>

	<!--
	switch de langue (Polylang)
	https://polylang.pro/doc/function-reference/#pll_the_languages
	-->
	<?php
	pll_the_languages(
		array(
			'show_names' => 0,
			'dropdown'   => 0,
			'show_flags' => 1,
		)
	);
	?>
</footer>
</div>
</div>
<?php wp_footer(); ?>
</body>

</html>
