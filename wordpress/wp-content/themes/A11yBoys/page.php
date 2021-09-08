<?php
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<h1 class="right-title"><?php the_title(); ?></h1>
		<article class="post post--single text-pages">
			<?php the_content(); ?>
		</article>
		<?php
endwhile;
endif;
get_footer();
