<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 23/11/2017
 * Time: 14:45
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

$varEntr = [ 'produit',
             'quantite'
            ];

//$varEntr = [ ['produit', 'string'],
//             ['quantite', 'int']
//            ];
//$varEntr = [ ['nom' => 'produit', 'type' =>'string'],
//             ['nom' => 'quantite', 'type' => 'int']
//            ];

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


// Si $quantite est bien un entier et $produit est bien un string
// Si $produit a plus de 3 caractères
if ((filter_var($produit,FILTER_SANITIZE_STRING))
    && (filter_var(filter_var($quantite, FILTER_SANITIZE_NUMBER_INT), FILTER_VALIDATE_INT))
    && (tailleMinVar($produit, 3) !== false)){

    // ma requête
    $req_insert = "INSERT INTO produits(
                            produit, 
                            quantite                         
                    )VALUES( 
                            :produit,
                            :quantite 
                   )";

    // prépare la requête
    $list_prod_insert = $bdd->prepare($req_insert);

    // lie la variable $id_prod définie au-dessus au paramètre :id_produit de la requête préparée
    $list_prod_insert->bindValue(':produit', $produit, PDO::PARAM_STR);
    $list_prod_insert->bindValue(':quantite', $quantite, PDO::PARAM_INT);


    $list_prod_insert->execute(array(
        'produit' => $produit,
        'quantite' => $quantite
    ));

    header('Location: http://localhost/ListeCourses/index.php');


} else {
    header('Location: http://localhost/ListeCourses/index.php');

}