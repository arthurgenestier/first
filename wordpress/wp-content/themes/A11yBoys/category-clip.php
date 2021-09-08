<?php get_header(); ?>

    <div class="clips-banner">
        <h1>Clips</h1>
    </div>
    <div class="content">
        <ul class="clips">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <li class="clips__item">
                    <h2><?= the_title(); ?></h2>
                    <div class="clips__video">
                        <?= the_content(); ?>
                        <p><?php the_field('duree'); ?> min</p>
                    </div>  
                    <a class="detail-link" href="<?php the_permalink(); ?>">Détails...</a>    
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
