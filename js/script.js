
// lorsque je vais cliquer sur la poubelle
// j'exécuterais le php dans supprim.php
// en passant id dans l'url
$(".supprimer").click(function () {
    // je récupère l attribut data_id de la ligne cliquer
    var id = $(this).attr('data-id');
    // je passe la valeur dans idProd pour le passer dans le GET
    var data = {
        idProd : id
    }
    $.ajax({
        url: "http://localhost/ListeCourses/supprim.php", // La source ciblée
        // par defaut la methode est GET
        data: data, // la valeur passer dans le GET
        // Le type de données pouvant être transmises au serveur : php, html, script, json et xml
        dataType: "script"
    });
    // cachera la ligne du produit cliquer
    $('#id_ligne_prod').remove();
});

// voir avec document.ready pour mettre du code avec page charger dans le fichier js
jQuery(document).ready(function ($) {



});