<?php
/**
 * Single
 *
 * @package blogintegrally
 */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<h1 class="right-title"><?php the_title(); ?></h1>
		<article class="post post--single">
		<?php
		/* le code ci dessous permet de récupérer le nom et le slug de la catégorie de l'article en cours dans la boucle, il me permet aussi de construire l'URL vers cette catégorie*/
		$categories = get_the_category();
		/* On récupère grace à get_the_categories() un tableau (array) avec toutes les informations sur les catégories liées à l'article courant */
		$first_category = $categories[0]; /* on récupère uniquement la première catégorie de l'array */
		$category_name  = $first_category->name; /* on récupère le nom de la catégorie */
		$category_slug  = $first_category->slug; /* on récupère le slug de la catégorie */
		$category_link  = get_bloginfo( 'url' ) . '/category/' . $first_category->slug; /* on créé une l'URL vers notre page catégorie en assemlant (en concaténant) 1. l'URL du site (get_bloginfo('url')) 2. '/category/' 3. le slug de notre catégorie */
		?>
		<a href="<?php echo esc_html( $category_link ); ?>" class="post__category post__category--<?php echo esc_html( $category_slug ); ?>"><?php echo esc_html( $category_name ); ?></a>
			<p class="post__infos">
			<?php
			$author_id = get_the_author_meta( 'ID' );
			/* Le code ci-dessous permet de générer l'image de l'avatar*/
			echo get_avatar(
				$author_id, /* identifiant de l'utilisateur */
				24, /* largeur et hauteur en px */
				'',
				'',
				array(
					'class' => 'post__author-pic', /* class de l'image générée */
				)
			);
			?>
			<em class="post__author"><?php the_author(); ?></em> <?php esc_html_e( 'le', 'blog-integrally' ); ?>
			<time datetime="<?php the_date( 'Y-m-d' ); ?>"><?php echo get_the_date(); ?></time>
			<?php
			/* si le champ "temps_de_lecture" a été renseigné (il est "non vide)"*/
			if ( get_field( 'temps_de_lecture' ) ) :
				?>
			<!-- On affiche le temps de lecture avec the_field() qui est une sorte de template tag spécifique à l'affichage de la valeur des champs ACF (on est toujours dans la boucle WP)-->
			- <?php esc_html_e( 'Temps de lecture', 'blog-integrally' ); ?> : <?php the_field( 'temps_de_lecture' ); ?> <?php esc_html_e( 'min.', 'blog-integrally' ); ?>
			<?php endif; ?>
			</p>
			<?php the_content(); ?>

			<!--
				On souhaite proposer au lecteur 3 articles aléatoirement, de la meme catégorie que l'article qu'il vient de lire.

				J'ai besoin pour celà :
				- d'une boucle custom / personnalisée (https://developer.wordpress.org/reference/classes/wp_query/)
				- template tags

				Objectif de la boucle personnalisée : aller chercher du contenu selon certains critères (définis dans le code) indépendemment du contexte dans lequel on se trouve. On va expliquer à la boucle ce qu'elle doit aller chercher et comment elle doit aller le chercher.

				Exemples :

				- aller chercher le contenu d'une page sur single.php
				- aller chercher des articles sur page.php
				- mettre un article en avant dans header.php
				- afficher les articles d'un certain auteur sur home.php

				Paramètres de ma boucle personnalisée :
				- posts_per_page => 3
				- orderby => 'rand'
				- category_name => $category_slug
				- 'post__not_in' => array(get_the_ID())

			-->

			<h3><?php esc_html_e( 'Ces articles vont aussi vous intéresser', 'blog-integrally' ); ?> :</h3>
			<ul>
			<?php

			/* Etapes pour construire une boucle personnalisée */

			/* 1. Tableau associatif avec les paramètres de notre boucle */
			$args = array(
				'posts_per_page' => 3, /* va me chercher 3 posts */
				'orderby'        => 'rand', /* aléatoirement */
				'category_name'  => $category_slug, /* dans une certaine catégorie */
				'post__not_in'   => array( get_the_ID() ), /* on exclu l'article courant en spécifiant son identifiant (attention, celui-ci doit etre dans un array) */
			);

			/* 2. On indique à WordPress qu'avec $related_posts_query, la boucle devra fonctionner tel qu'on l'a définit dans $args */
			$related_posts_query = new WP_Query( $args );

			/* 3. On utilise la requete construite à partir des paramètres dans la boucle */
			if ( $related_posts_query->have_posts() ) :
				while ( $related_posts_query->have_posts() ) :
					$related_posts_query->the_post();
					?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?> (<time datetime="<?php the_date( 'Y-m-d' ); ?>"><?php echo get_the_date(); ?></time>)</a></li>
					<?php
				endwhile;
			endif;
			?>
			</ul>
		</article>
		<?php
endwhile;
endif;
get_footer();
