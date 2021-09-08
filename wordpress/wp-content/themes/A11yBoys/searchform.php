        <!-- <form role="search" action="<?php echo home_url(); ?>" method="GET" class="footer-searchform">
            <label for="footer-searchform-input" class="footer-searchform__label">Recherche</label>
            <div class="searchform__input-container">
                <input type="text" id="footer-searchform-input" class="searchform__input" title="recherche" aria-required="true" required>
                <button type="submit" class="searchform__button">
                    <img class="searchform__icon" src="./assets/images/search-icon.svg" alt="">
                </button>
            </div>
        </form> -->


<form action="<?php echo home_url(); ?>" method="get" class="footer-searchform">
    <label for="s" class="footer-searchform__label">Termes à rechercher</label>
    <div class="searchform__input-container">
    <input type="search"  name="s" type="text" id="searchform-input" class="searchform__input" title="recherche" aria-required="true" required>
    <button type="submit" class="searchform__button"><img class="searchform__icon" src="<?= get_theme_file_uri('assets/images/search-icon.svg'); ?>" alt="">
    </button>
</form>