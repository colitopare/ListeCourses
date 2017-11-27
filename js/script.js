// voir avec document.ready pour mettre du code avec page charger dans le fichier js
// le $ pourra être utiliser pour faire du jQuery
jQuery(document).ready(function ($) {


});

// lorsque je vais cliquer sur la poubelle
// j'exécuterais le php de supprim.php
// en passant id dans l'url
$(".supprimer").click(function () {
    // je récupère l attribut data_id de la ligne cliquer
    // var pour que la variable soit en local
    var id = $(this).attr('data-id');
    // je passe la valeur dans idProd pour le passer dans le GET
    var data = {
        idProd: id
    }
    $.ajax({
        url: "http://localhost/ListeCourses/supprim.php", // La source ciblée
        // par defaut la methode est GET
        data: data, // la valeur passer dans le GET
        // Le type de données pouvant être transmises au serveur : php, html, script, json et xml
        dataType: "script"
    });
});


// lorsque je vais cliquer sur la case pris du produit
// j'exécuterais le php de check.php
// en passant id dans l'url
$(".checkFait").click(function () {
    // je récupère l attribut data_id de la ligne cliquer
    var id = $(this).attr('data-check');
    // Pour utiliser un même fichier pour faire check ou plus je passe un deuxième paramètre dans l'URL
    var action = $(this).attr('action');
    // je passe la valeur dans idProd pour le passer dans le GET
    var data = {
        idProd: id
    }
    $.ajax({
        url: "http://localhost/ListeCourses/check.php", // La source ciblée
        // par defaut la methode est GET
        data: data, // la valeur passer dans le GET
        // Le type de données pouvant être transmises au serveur : php, html, script, json et xml
        dataType: "script"
    });
});


// lorsque je vais cliquer sur la case moins
// j'exécuterais le php de quantite.php
// en passant id dans l'url
$(".moins").click(function () {
    // je récupère l attribut data_id de la ligne cliquer
    var id = $(this).attr('data-moins');
    // Pour utiliser un même fichier pour faire moins ou plus je passe un deuxième paramètre dans l'URL
    var action = $(this).attr('action');
    // je passe la valeur dans idProd pour le passer dans le GET
    var data = {
        idProd: id,
        action: action
    }
    $.ajax({
        url: "http://localhost/ListeCourses/quantite.php", // La source ciblée
        // par defaut la methode est GET
        data: data, // la valeur passer dans le GET
        // Le type de données pouvant être transmises au serveur : php, html, script, json et xml
        dataType: "script"
    });
});
