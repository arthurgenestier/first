<?php get_header(); ?>

<div class="tour-banner">
        <h1>Tour</h1>
    </div>

    <div class="content">
        <ul class="tour__list">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <li class="tour__item">
                    <?php the_post_thumbnail(); ?> 
                    <div class="tour__excerpt">
                        <p><?php the_field('date'); ?></p>
                    </div>
                    <a class="detail-link" href="<?php the_permalink(); ?>">Lire la suite...</a>         
                </li> 
            
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no clip matched your criteria.' ); ?></p>
            <?php endif; ?>
        </ul>
    </div>

    <?php 
        the_posts_pagination([
            'aria-label'    => 'Navigation des concerts',
            'type'          => 'list',
            'prev_text' => '<span class="visually-hidden">Articles </span>Précédent',
            'next_text' => '<span class="visually-hidden">Articles </span>Suivant',
            'before_page_number' => '<span class="visually-hidden">Page </span>'
        ]); 

get_footer(); ?>