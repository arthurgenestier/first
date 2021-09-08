<?php get_header(); ?>

<h1>Résultats de la recherche : <?php echo get_search_query(); /* affiche des termes recherchés */?></h1>
<article class="post post--single content text-pages">
<?php
/* si on trouve des articles correspondants à la recherche */
if (have_posts()) :
    /* tant qu'il y a des articles correspondants à la recherche, on récupère ces artcles */
    while (have_posts()) : the_post();
?>

    <article>
        <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
    </article>

    <?php
    endwhile;
/* Sinon (rien ne correspond à la recherche) */
else :
    ?>
    <p>Pas de résultats pour votre recherche.</p>
<?php
?>
</article>
<?php

endif;


get_footer();
