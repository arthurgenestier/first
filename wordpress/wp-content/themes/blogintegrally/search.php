<?php
/**
 * Résultats de recherche
 *
 * @package blogintegrally
 */

get_header();

?>
<h2 class="right-title"><?php esc_html_e( 'Résultats de la recherche', 'blog-integrally' ); ?> : <?php echo get_search_query(); ?></h2>
<div class="posts">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article class="post">
				<?php
					$cartegories    = get_the_category();
					$first_category = $cartegories[0];
					$category_name  = $first_category->name;
					$category_slug  = $first_category->slug;
					$category_link  = get_bloginfo( 'url' ) . '/category/' . $first_category->slug;
				?>
				<a href="<?php echo esc_html( $category_link ); ?>" class="post__category post__category--<?php echo esc_html( $category_slug ); ?>"><?php echo esc_html( $category_name ); ?></a>
				<h3 class="post__title"><?php the_title(); ?></h3>
				<p class="post__infos">
					<?php
						$author_id = get_the_author_meta( 'ID' );
						echo get_avatar(
							$author_id,
							24,
							'',
							'',
							array(
								'class' => 'post__author-pic',
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
		<p><?php esc_html_e( 'Aucun article correspondant à la recherche', 'blog-integrally' ); ?></p>
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
