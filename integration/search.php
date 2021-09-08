<?php get_header(); ?>
      <section class="recherche">
        <h3>Résultat</h3>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <p> Voici le resultat de vote recherche</p>
        <h4> <?php the_title(); ?></h4>
        <?php the_content(); ?>

        <?php endwhile; else : ?>
	         <p><?php esc_html_e( 'Desole, pouvez vous recherche autre' ); ?></p>
        <?php endif; ?>

      </section>
      <?php get_sidebar(); ?>

<?php get_footer(); ?>