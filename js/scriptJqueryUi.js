// voir avec document.ready pour mettre du code avec page charger dans le fichier js
jQuery(document).ready(function () {



////////////////////////////////////////////////////////////////////////////////////
// Créer une zone de contenu unique avec plusieurs panneaux (tabs)
// , chacun associé à un en-tête dans une liste
////////////////////////////////////////////////////////////////////////////////////////

// A faire  appliquer sur les pages où l id du body = formatTabs

// Pour faire les onglets avec jQuey UI sur la page contenusJqueryUI.html
    $(function () {
        $("#tabs").tabs();
    });


// création dynamique juste avant le premier h2
    $('h2').before('<div id="tabs" class="container"></div>');

});


