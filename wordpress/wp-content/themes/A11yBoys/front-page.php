<?php
/** 
*Front-page
*
*@package A11yBoys
*
*/

get_header(); ?>
    <div class="home-banner">
        <h1>Welcome</h1>
    </div>

    <div class="pre-content">
        <div class="music-player__wrapper">
            <p>Un petit morceaux?</p>
            <?php 
                $argsFeaturedMusic = array(
                    'cat'            => 8,
                    'posts_per_page' => 1,
                );

                $musicQuery = new WP_Query( $argsFeaturedMusic );
            ?>

            <?php if ( $musicQuery->have_posts() ) : 
                while ( $musicQuery->have_posts() ) :   $musicQuery->the_post(); ?>
                <div class="music-player__featured-audio">     
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
                    
            <?php else: ?>
                <p><?php _e('Aucune musique trouvé'); ?></p>
            <?php 
                endif;
                wp_reset_postdata(); 
            ?>    
        </div>
    
        <div class="ctas">
            <ul>
                <li>
                    <a href="./fanclub" class="ctas__link ctas__link--fanclub">Fan club</a>
                </li>
                <li>
                    <a href="./newsletter" class="ctas__link ctas__link--newsletter">Newsletter</a>
                </li>
            </ul>
        </div>
    
        <div class="follow-us follow-us__header">
            <p>Nous suivre</p>
            <ul class="follow-us__list">
                <li class="follow-us__item">
                    <a href="https://instagram.com/a11y_boys" class="follow-us__link" title="Lien vers la page instagram du groupe">
                        <img src="<?= get_theme_file_uri( 'assets/images/social-medias/insta.svg' ); ?>" alt="logo instagram" class="follow-us__icon">
                    </a>
                </li>
                <li class="follow-us__item">
                    <a href="https://youtube.com/c/a11y_boys" class="follow-us__link" title="Lien vers la page youtube du groupe.">
                        <img src="<?= get_theme_file_uri( 'assets/images/social-medias/yt.svg' ); ?>" alt="logo youtube" class="follow-us__icon">
                    </a>
                </li>
                <li class="follow-us__item">
                    <a href="https://twitter.com/a11y_boys" class="follow-us__link" title="Lien vers la page twitter du groupe.">
                        <img src="<?= get_theme_file_uri( 'assets/images/social-medias/twitter.svg' ); ?>" alt="logo twitter" class="follow-us__icon">
                    </a>
                </li>
            </ul>
        </div>
    </div>
        
    <div class="content"> 

        <section class="clip" id="featured-clip">
            <a href="<?php echo bloginfo('url') . "/category/clip" ?>"><h2>Clips</h2></a>
            <?php 
                // les paramètres de votre boucle
                $argsClips = array(
                    'cat'               => 3, // ou 'cat' => 1 (id de votre catégorie, méthode a priviligier pour pas tout casser si on change le slug d'une catégorie)
                    'posts_per_page'    => 2, // nombre d'article à afficher
                );

                // WP_Query pour instancier une nouvelle requête (boucle custom)
                $clipsQuery = new WP_Query( $argsClips );
            ?>

            <?php if ( $clipsQuery->have_posts() ) : // ici je place la condition, si il y a des posts alors j'affiche la liste ?>
            <ul class="clip__videos">
            <?php while ( $clipsQuery->have_posts() ) : $clipsQuery->the_post(); // tant qu'il y a des posts je génère un item de liste pour chacun d'entre eux

                $categories     = get_the_category();
                $first_category = $categories[0];
                $category_name  = $first_category->name;
                $category_slug  = $first_category->slug;
                $category_id    = $first_category->cat_ID;
                $category_link  = get_bloginfo( 'url' ) . '/category/' . $first_category->slug;
            ?>
                <li class="clip__item">
                    <a href="<?php the_permalink(); ?>" class="clip__link">
                        <h3 class="clip__title"><?php the_title(); ?></h3>
                    </a>
                        
                    <?php the_content(); ?>
                    <p><?php the_field('duree'); ?> min</p>
                </li>
                <?php endwhile; // fin de la boucle while, il n'y a donc plus d'article ?>
            </ul>

            <?php else: // s'il n'y a aucun article, au lieu d'afficher la liste, on affiche un paragraphe qui explique ce qu'il se passe ?>
                <p><?php _e('Aucun clip trouvé'); ?></p>
            <?php 
                endif;
                 wp_reset_postdata(); // important, pour remettre les données WP_Query à zero, avant de générer une nouvelle boucle
            ?>
        </section>

        <section class="featured-album" id="musiques">
            <a href="./category/musique"><h2>Albums</h2></a>
            <?php 
                $argsMusic = array(
                    'cat'               => 2,
                    'posts_per_page'    => 3,
                );
                $musicQuery = new WP_Query( $argsMusic );
            ?>

            <?php if ( $musicQuery->have_posts() ) : ?>
            <ul class="featured-album__list">
                <?php while ( $musicQuery->have_posts() ) : $musicQuery->the_post(); ?>
                <li class="featured-album__item">
                    <?php the_post_thumbnail(); ?>
                    <div class="featured-album__infos">
                        <p class="featured-album__title"><?php the_title(); ?> - <?php the_field('duree'); ?> min</p>
                        <a class="featured-album__link" href="<?php the_permalink(); ?>">Détails...</a>
                    </div>   
                </li>
                <?php endwhile; ?>  
            </ul>

            <?php else: ?>
                <p><?php _e('Aucune musique trouvé'); ?></p>
            <?php 
                endif;
                wp_reset_postdata(); 
            ?>    
        </section>

        <section class="concert" id="tour">
            <a href="<?php echo bloginfo('url') . "/category/tour" ?>"><h2>Tournées</h2></a>

            <?php 
                $argsTour = array(
                    'cat'               => 4,
                    'posts_per_page'    => 3,
                );

                $tourQuery = new WP_Query( $argsTour );
            ?>

            <?php if ( $tourQuery->have_posts() ) : ?>
            <ul class="concert__list">
            <?php while ( $tourQuery->have_posts() ) : $tourQuery->the_post(); ?>
                <li class="concert__item">
                    <?php the_post_thumbnail(); ?>
                    <span><?php the_field('date'); ?></span>
                    <a class="ctas__link ctas__link--buy" href="<?php the_permalink(); ?>">BUY TICKETS</a>
                </li>
            <?php endwhile; ?>       
            </ul>
            <?php else: ?>
                <p><?php _e('Aucune date trouvé'); ?></p>
            <?php 
                endif;
                wp_reset_postdata(); 
            ?>
        </section>
    </div>

<?php get_footer();