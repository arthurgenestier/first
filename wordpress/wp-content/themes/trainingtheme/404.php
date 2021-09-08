<?php get_header(); ?>

<main role="main" id="main-content">
	<article>
		<header>
			<h1>Page non trouvée</h1>
		</header>
		<main>
			<?php
			/*
			get_search_form() charge le fichier searchform.php s'il existe
			sinon, il génère et affiche un formulaire de recherche
			*/
			get_search_form();
			?>
		</main>
	</article>
	</nav>
</main>

<?php get_footer(); ?>