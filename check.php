<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 24/11/2017
 * Time: 15:43
 */


///////////////////////////////////////////////////
/// ce fichier va me permettre en fonction de l'action passer de modifie
/// check, moins et plus
//////////////////////////////////////////////////

//connection à la base de données
require_once 'connexion.php';

include 'fonctions.php';

///////////////////////////////////////////////////
/// STARTER de récupération de valeur passée en GET ou POST
///////////////////////////////////////////////////
///// remplace le if (isset($_POST ou $_GET)
// valeur récupérer du formulaire Inserrer
$varEntr = ['idProd'];

foreach ($varEntr as $champTester) {
    //// si les valeurs sont passées en $_GET
    if (isset($_GET[$champTester])) {
        $$champTester = $_GET[$champTester];
        // je fais les tests automatiques sur le type de la valeur
        //     TestTypeValeur($_GET[$champTester]['type']);
        ////// sinon si les valeurs sont passées en $_POST
    } elseif (isset($_POST[$champTester])) {
        $$champTester = $_POST[$champTester];
        // je fais les tests automatiques sur le type de la valeur
        //    TestTypeValeur($_POST[$typeTester]['type']);
    } else {
        $$champTester = false;
    }
}

//je cherche si le produit dont l'id est passé dans l'URL existe ou pas
$requete = "SELECT * FROM produits WHERE id_produit =  " . $idProd;


//je regarde dans ma base de données 'fait' du produit ciblé
// est à 1 ou à 0
foreach ($bdd->query($requete) as $row) {


    // Si fait = 1 alors je fais ma requete pour passer à 0
    if ($row['fait'] == 1) {
        $fait = 0;
        // ma requete
        $req_update_fait = "UPDATE produits
                    SET fait = '0' WHERE id_produit = :id_produit";
        // prépare la requête
        $prod_update = $bdd->prepare($req_update_fait);

        // lie la variable $id_prod définie au-dessus au paramètre :id_produit de la requête préparée
        $prod_update->bindValue(':id_produit', $idProd, PDO::PARAM_INT);

        $prod_update->execute();
//        updateFaitProduit($fait, $idProd);

        ////////////////////////////////////////////
        // script jouer dès que le code PHP est executé
        ///////////////////////////////////////////////
        echo 'console.log("c ok à 0");';

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // cachera la ligne du produit cliquer (avec l'id_produit)
        echo "$('#id_$idProd .checkFait').removeClass('fa-check-square-o').addClass('fa-square-o');";



        // sinon je le passe à 1
    } else {
        $fait = 1;
        // ma requete
        $req_update_fait = "UPDATE produits
                    SET fait = '1' WHERE id_produit = :id_produit";
        // prépare la requête
        $prod_update = $bdd->prepare($req_update_fait);

        // lie la variable $id_prod définie au-dessus au paramètre :id_produit de la requête préparée
        $prod_update->bindValue(':id_produit', $idProd, PDO::PARAM_INT);

        $prod_update->execute();

        //       updateFaitProduit($fait, $idProd);
        ////////////////////////////////////////////
        // script jouer dès que le code PHP est executé
        ////////////////////////////////////////////////
        echo 'console.log("c ok à 1");';

        // cachera la ligne du produit cliquer (avec l'id_produit)
        echo "$('#id_$idProd .checkFait').removeClass('fa-square-o').addClass('fa-check-square-o');";

    }

}

