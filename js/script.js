// voir avec document.ready pour mettre du code avec page charger dans le fichier js
// le $ pourra être utiliser pour faire du jQuery
jQuery(document).ready(function ($) {


});

// var id = $($(this).parent('td')).attr('data-idProd');
// console.log(id);


// En fonction du button créer cliquer ou article cliquer
// le texte dans la modal sera différent
$('#creerProd').on('click', function () {
    $('h5.modal-title').text('Ajouter un article');
    $('form#formProduit').attr('action', 'ajouter.php');
    $('button#submitForm').text('Ajouter');
});


$('.checkModif').on('click', function () {
    var id = $($(this).attr('data-id'));
    var produit = $($(this).parent('td')).attr('data-prod');

    $($(this).parent('td').prev('td').html(
                                '<input type="texte" name="produit" class="form-control" value="' + produit + '">'));
    $($(this).parent('td').html('<button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>' +
                                '<button id="submitForm" type="submit" class="btn btn-warning float-right">Modifier</button>'));
console.log(($(this).parent('td').prev('td')).children('input').attr('value'));

    // if (($(this).parent('td').prev('td')).children('input').attr('value') != produit){
    //
    //     var newProd = $(($(this).parent('td').prev('td')).attr('value'));
    //     // je passe la valeur dans idProd pour le passer dans le GET
    //     var data = {
    //         idProd: id,
    //         newProd: newProd
    //     }
    //     $.ajax({
    //         url: "http://localhost/ListeCourses/modifier.php", // La source ciblée
    //         // par defaut la methode est GET
    //         data: data, // la valeur passer dans le GET
    //         // Le type de données pouvant être transmises au serveur : php, html, script, json et xml
    //         dataType: 'script',
    //         success: function () {
    //
    //         }
    //     });
    // };

});



//////////////////////////////////////////////
// Avec CALLBACK  ///////////////////////////
// lorsque je vais cliquer sur la poubelle
// j'exécuterais le php de supprim.php
// en passant id dans l'url
$('.checkSup').on('click', function () {
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


//////////////////////////////////////////////
// Avec CALLBACK  ///////////////////////////
// j'exécuterais le php de trier.php
// en passant le champ à trier dans l'url
$('.trieCroissant').parent('th').on('click', function () {
    var champ = $(this).attr('id');
    console.log(champ);
    // je passe la valeur dans idProd pour le passer dans le GET
    var data = {
        champ: champ
    }
    $.ajax({
        url: "http://localhost/ListeCourses/trier.php", // La source ciblée
        // par defaut la methode est GET
        data: data, // la valeur passer dans le GET
        // Le type de données pouvant être transmises au serveur : php, html, script, json et xml
        dataType: 'text',
        success: function (liste_trier) {
            console.log(liste_trier);
            // $.each(liste_trier, function (key, valeur) {
            //
            //     // console.log(key['id_produit'], valeur);
            //
            // })
            $('#messAlert').addClass('alert alert-success');
            $('#messAlert').prepend('Le trie c est bien passé');
        }
    });
});