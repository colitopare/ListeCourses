<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 27/11/2017
 * Time: 17:15
 */

//connection rootà la base de données
require_once 'connexion.php';

// j'appelle fonctions.php car je vais en avoir besoin de fonctions faites dans ma page
include 'fonctions.php';

///////////////////////////////////////////////////
/// STARTER de récupération de valeur passée en GET ou POST
///////////////////////////////////////////////////
///// remplace le if (isset($_POST ou $_GET)
// valeur récupérer du formulaire Inserrer

$varEntr = ['idProd', 'champ'];

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

$requeteTrie = "SELECT * FROM produits ORDER BY champ = :champ ";
$trieChamp = $bdd->prepare($requeteTrie);

// lie la variable $id_prod définie au-dessus au paramètre :id_produit de la requête préparée
$trieChamp->bindValue(':champ', $champTester, PDO::PARAM_STR);
$trieChamp->execute();

$liste_trier = $trieChamp->fetchAll();

var_dump($liste_trier);

