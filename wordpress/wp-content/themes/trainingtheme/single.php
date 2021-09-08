<?php get_header(); ?>

<main role="main" id="main-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article>
				<header>
					<h1><?php the_title(); ?></h1>
					<figure>
						<?php the_post_thumbnail(); ?>
						<figcaption class="visually-hidden">Random image 1</figcaption>
					</figure>
				</header>
				<main>
					<?php the_content(); ?>
				</main>
				<footer>
					<span>Par <a href=""><?php the_author(); ?></a> le <?php the_date(); ?> dans <?php the_category(); ?></span>
				</footer>
			</article>

	<?php endwhile;
	endif; ?>

</main>

<?php get_footer(); ?>