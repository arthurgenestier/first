<?php get_header(); ?>

<h1>Résultats de la recherche : <?php echo get_search_query(); /* affiche des termes recherchés */?></h1>

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
endif;

the_posts_pagination([
    'aria_label' => 'Navigation des articles', // gestion de l'attribut aria-label
    'type' => 'list', // gestion de la structure HTML
    'prev_text' => '<span class="visually-hidden">Articles </span>Précédents', // gestion du texte "Précédent"
    'next_text' => '<span class="visually-hidden">Articles </span>Suivants', // gestion du texte "Suivant"
    'before_page_number' => '<span class="visually-hidden">Page </span>' // gestion de l'intitulé des liens des pages
]);

get_footer();
