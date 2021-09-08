<?php
/**
 * Home
 *
 * @package blogintegrally
 */

get_header();

?>
<h2 class="right-title"><?php esc_html_e( 'Derniers articles', 'blog-integrally' ); ?></h2>
<div class="posts">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article class="post">
				<?php
					/* le code ci dessous permet de récupérer le nom et le slug de la catégorie de l'article en cours dans la boucle, il me permet aussi de construire l'URL vers cette catégorie*/
					$categories = get_the_category();
					/* on récupère grace à get_the_categories() un tableau (array) avec toutes les informations sur les catégories liées à l'article courant */
					$first_category = $categories[0]; /* on récupère uniquement la première catégorie de l'array */
					$category_name  = $first_category->name; /* on récupère le nom de la catégorie */
					$category_slug  = $first_category->slug; /* on récupère le slug de la catégorie */
					$category_id    = $first_category->cat_ID; /* on récupère l'ID de la catégorie */
					$category_link  = get_bloginfo( 'url' ) . '/category/' . $first_category->slug; /* on créé une l'URL vers notre page catégorie en assemlant (en concaténant) 1. l'URL du site (get_bloginfo('url')) 2. '/category/' 3. le slug de notre catégorie */
				?>

				<!--	
					On souhaite récupérer la valeur du champ ACF "Couleur de la catégorie" et modifier le style du lien avec celle-ci.
					Souci : la fonction the_field() va, si on ne lui précise rien de plus que le nom du champ, aller chercher un champ pour l'article courant (et non pas la catégorie de l'article comme souhaité)
					Solution : dans la documentation d'ACF, on nous propose d'aller ajouter un 2e paramètre à the_field() pour préciser le contenu concerné par le champ personnalisé.
					Du coup, on récupère la couleur de notre catégorie avec :
					the_field('couleur_de_la_categorie', 'category_' . $category_id);
					couleur_de_la_categorie => nom du champ
					category_1234 => "va chercher la valeur du champ de telle catégorie"
				-->
				<a style="background-color:<?php the_field( 'couleur_de_la_categorie', 'category_' . $category_id ); ?>;" href="<?php echo esc_html( $category_link ); ?>" class="post__category post__category--<?php echo esc_html( $category_slug ); ?>"><?php echo esc_html( $category_name ); ?></a>
				<?php /* esc_html() permet d'échapper le HTML, c'est à dire l'ignorer lors de l'affichage de la variable */ ?>
				<h3 class="post__title"><?php the_title(); ?></h3>
				<p class="post__infos">
					<?php
						/* le code ci-dessous permet de générer l'image de l'avatar*/
						$author_id = get_the_author_meta( 'ID' );
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
					<time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date(); ?></time>
				</p>
				<p class="post__text">
					<?php the_excerpt(); ?>
				</p>
				<a href="<?php the_permalink(); ?>" class="post__link" aria-label="Lire la suite : <?php the_title(); ?>"><?php esc_html_e( 'Lire la suite', 'blog-integrally' ); ?></a>
			</article>
					<?php
		endwhile;
	else :
		?>
		<p><?php esc_html_e( 'Aucun article trouvé', 'blog-integrally' ); ?></p>
	<?php endif; ?>
</div>

<?php
/*
Permet de générer une pagination
attention : pas accessible par défaut
on va donc fournir des arguments pour la rendre accessible
https://developer.wordpress.org/reference/functions/the_posts_pagination/
https://make.wordpress.org/accessibility/handbook/markup/the-css-class-screen-reader-text/
*/

the_posts_pagination(
	array(
		'aria_label'         => 'Navigation des articles', /* gestion de l'attribut aria-label */
		'type'               => 'list', /* gestion de la structure HTML */
		'prev_text'          => '<span class="screen-reader-text">Articles </span>Précédents', /* gestion du texte "Précédent" */
		'next_text'          => '<span class="screen-reader-text">Articles </span>Suivants', /* gestion du texte "Suivant" */
		'before_page_number' => '<span class="screen-reader-text">Page </span>', /* gestion de l'intitulé des liens des pages */
	)
);
get_footer();
