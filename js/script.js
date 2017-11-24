// lorsque je vais cliquer sur la poubelle
// j'exécuterais le php de supprim.php
// en passant id dans l'url
$(".supprimer").click(function () {
    // je récupère l attribut data_id de la ligne cliquer
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
// j'exécuterais le php de chek.php
// en passant id dans l'url
$(".chekFait").click(function () {
    // je récupère l attribut data_id de la ligne cliquer
    var id = $(this).attr('data-chek');
    // je passe la valeur dans idProd pour le passer dans le GET
    var data = {
        idProd: id
    }
    $.ajax({
        url: "http://localhost/ListeCourses/chek.php", // La source ciblée
        // par defaut la methode est GET
        // method: POST,
        data: data, // la valeur passer dans le GET
        // Le type de données pouvant être transmises au serveur : php, html, script, json et xml
        dataType: "script"
    });
});


// voir avec document.ready pour mettre du code avec page charger dans le fichier js
jQuery(document).ready(function () {


});