# Mettre en place le moteur de recherche WordPress

WordPress intègre nativement un moteur de recherche. Pour tester : `http://adresse-du-site?s=mot-clef-a-chercher`.

Pour que l'utilisateur puisse intérragir avec ce moteur de recherche, on peut lui mettre à disposition un formulaire de recherche.

1. Intégrer un formulaire de recherche (https://developer.wordpress.org/reference/functions/get_search_form/)
    ```php
    /*
    get_search_form() charge le fichier searchform.php s'il existe (dans le thème)
    sinon, il génère et affiche un formulaire de recherche
    */
    get_search_form();
    ```

à la soumission du formulaire, le fichier de template `search.php` est utilisé pour afficher les résultats de la recherche

2. Créer un fichier de template `search.php` avec :
   - (optionnel) les termes recherchés par l'utilisateur (https://developer.wordpress.org/reference/functions/get_search_query/)
   - la boucle WordPress, qui permet d'aller chercher les résultats de la recherche
   - une pagination pour limiter le nombre de résultats par page