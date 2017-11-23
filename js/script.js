// voir avec document.ready pour mettre du code avec page charger dans le fichier js
jQuery(document).ready(function ($) {

// lorsque je vais cliquer sur la poubelle
// j'exécuterais le php dans supprim.php
// en passant id dans l'url
    $("#supprimer").click(function () {
        $.ajax({
            url: "http://localhost/ListeCourses/supprim.php", // La source ciblée
            type: "GET",        // type
            data: "id =" + $row['id_produit'] // la valeur passer dans le GET
        });
    });










});