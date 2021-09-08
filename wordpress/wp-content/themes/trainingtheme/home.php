<?php get_header(); ?>

<main role="main" id="main-content">


	<?php
	// si on a des articles à afficher (dans ce contexte), tant que l'on a des articles à afficher, on récupère le contenu de l'article (en cours) 
	if (have_posts()) : while (have_posts()) : the_post();
	?>

			<article>
				<header>
					<h2><a href="<?php the_permalink(); // affiche un lien vers l'article (en détail / la page de l'article) 
									?>"><?php the_title(); // affiche le titre
										?></a></h2>
					<figure>
						<?php the_post_thumbnail(); // affiche l'image mise en avant 
						?>
						<figcaption class="visually-hidden">Random image 1</figcaption>
					</figure>
				</header>
				<main>
					<?php the_excerpt(); // affiche l'extrait 
					?>
				</main>
				<footer>
					<span>Par <a href=""><?php the_author(); // affiche le nom de l'auteur 
											?></a> le <?php echo get_the_date(); // affiche la date de publication 
														?> dans <?php the_category(); // affiche une liste des catégories 
																												?></span>
					<a href="<?php the_permalink(); // affiche un lien vers l'article (en détail / la page de l'article) 
								?>">Lire la suite</a>
				</footer>
			</article>

		<?php
		// endwhile = on referme le "tant que l'on a des articles à afficher" (la boucle)
		endwhile;

	// si jamais on a pas d'articles à afficher
	else :
		?>
		<p>Pas d'articles à afficher</p>
	<?php
	// fermeture du "si on a des articles à afficher"
	endif;
	?>

	<!-- <nav class="pagination" role="navigation" aria-label="Navigation des articles">
      <h2 class="visually-hidden">Navigation des articles</h2>
      <ul class="page-numbers">
        <li><a class="" href=""><span class="visually-hidden">Articles </span>précédents</a></li>
        <li><span aria-current="page" class="page-numbers" href=""><span class="visually-hidden">Page </span>1</span></li>
        <li><a href=""><span class="visually-hidden">Page </span>2</a></li>
        <li><a href=""><span class="visually-hidden">Page </span>3</a></li>
        <li><a href=""><span class="visually-hidden">Articles </span>suivants</a></li>
      </ul>
    </nav> -->

	<?php

	// 2 manières de créer un tableau (array) en PHP
	// $tableau = [];
	// $tableau = array();

	?>

	<?php

	// permet de générer une pagination
	// attention : pas accessible par défaut
	// on va donc fournir des arguments pour la rendre accessible
	// https://developer.wordpress.org/reference/functions/the_posts_pagination/

	the_posts_pagination([
		'aria_label' => 'Navigation des articles', // gestion de l'attribut aria-label
		'type' => 'list', // gestion de la structure HTML
		'prev_text' => '<span class="visually-hidden">Articles </span>Précédents', // gestion du texte "Précédent"
		'next_text' => '<span class="visually-hidden">Articles </span>Suivants', // gestion du texte "Suivant"
		'before_page_number' => '<span class="visually-hidden">Page </span>' // gestion de l'intitulé des liens des pages
	]);

	?>

</main>

<?php get_footer(); ?>