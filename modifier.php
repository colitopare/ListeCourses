<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 28/11/2017
 * Time: 10:13
 */

//connection rootà la base de données
require_once 'connexion.php';

// j'appelle fonctions.php car je vais en avoir besoin de fonctions faites dans ma page
//include 'fonctions.php';

///////////////////////////////////////////////////
/// STARTER de récupération de valeur passée en GET ou POST
///////////////////////////////////////////////////
///// remplace le if (isset($_POST ou $_GET)
// valeur récupérer du formulaire Inserrer

$varEntr = ['idProd', 'produit'];

foreach ($varEntr as $champTester ){
    //// si les valeurs sont passées en $_GET
    if (isset($_GET[$champTester])){
        $$champTester = $_GET[$champTester];
        // je fais les tests automatiques sur le type de la valeur
        //     TestTypeValeur($_GET[$champTester]['type']);
        ////// sinon si les valeurs sont passées en $_POST
    }elseif (isset($_POST[$champTester])){
        $$champTester = $_POST[$champTester];
        // je fais les tests automatiques sur le type de la valeur
        //    TestTypeValeur($_POST[$typeTester]['type']);
    } else {
        $$champTester = false;
    }
}

$requeteModifier = "UPDATE produits
                    SET produit = :produit WHERE id_produit = :id_produit";
// prépare la requête
$prod_update = $bdd->prepare($requeteModifier);

$prod_update->bindValue(':produit', $produit, PDO::PARAM_STR);
$prod_update->bindValue(':id_produit', $idProd, PDO::PARAM_INT);

$prod_update->execute();
