</main>

<footer role="contentinfo" class="footer">
    <a href="<?php bloginfo('url'); ?>" class="footer__logo-link">
        <img src="<?= get_theme_file_uri( 'assets/images/logo_a11yboys.png' ); ?>" class="footer__logo" alt="Logo du groupe A11y boys" />
    </a>

    <div class="footer-container">
        <div class="menu-socials-container">
            <ul class="footer-menu">
            <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'container'      => false, 
                            'menu_class'     => 'menu__list'
                        )
                    );
                ?>
            </ul>
 
            <div class="follow-us">
                <p class="follow-us-text">Nous suivre</p>
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
  
        <?php
			get_search_form();
		?>
    </div>
    
    <p>a11y boys © 2021</p>
        
    <a class="up-link" href="#main">
        <img src="<?= get_theme_file_uri('assets/images/line.svg'); ?>" alt="haut de la page">
    </a>
    
</footer>

<script src="./assets/js/jquery-3.6.0.min.js"></script>
<script src="./assets/js/javascript.js"></script>

<?php wp_footer(); ?>

</body>
</html>