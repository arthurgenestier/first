<?php get_header(); ?>


            
<section class="content">

<img id="peugeot" src="<?= get_theme_file_uri( 'assets/images/404img.png' ); ?>" alt="erreur 404" width="600px">
    <p>Cette page n'existe pas.</p>

    <div class="footer-container">
    <?php
			get_search_form();
			?>
    </div>
    
        

</section>

<?php get_footer(); ?>