// voir avec document.ready pour mettre du code avec page charger dans le fichier js
// le $ pourra être utiliser pour faire du jQuery
jQuery(document).ready(function ($) {

// Au chargement de la page le formulaire ajouter produit doit être cacher
    $('form#ajouterProduit').css({display: none});

});

//////////////////////////////////////////////
// Avec CALLBACK  ///////////////////////////
// lorsque je vais cliquer sur la poubelle
// j'exécuterais le php de supprim.php
// en passant id dans l'url
$('.supprimer').on('click', function () {
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
        dataType: 'script',
        success: function (nbre) {
            $('#total span').text(nbre);
            // cachera la ligne du produit cliquer (avec l'id_produit)
            $('#id_' + id).remove();
            // je vais afficher un message pour dire que tout c'est bien passé
            // Je modifie la classe
            $('#messAlert').addClass('alert alert-success');
            $('#messAlert').prepend('Votre suppression c est bien passé');
        },
        error: function () {
            // je vais afficher un message pour dire que tout c'est bien passé
            // Je modifie la classe
            $('#messAlert').addClass('alert alert-danger');
            $('#messAlert').prepend('SUPPRESSION NON FAITE');
        }
    });
});


// lorsque je vais cliquer sur la case pris du produit
// j'exécuterais le php de check.php
// en passant id dans l'url
$('.checkFait').on('click', function () {
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
        dataType: 'script'
    });
});


// lorsque je vais cliquer sur la case moins
// j'exécuterais le php de quantite.php
// en passant id dans l'url
$('.moins').on('click', function () {
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
        dataType: 'script'
    });
});



// $('#btnAjouter').click(function () {
//     $('form#ajouterProduit').show();
// })