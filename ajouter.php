<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 23/11/2017
 * Time: 14:45
 */
//connection rootà la base de données
require_once 'connexion.php';

$produit = $_POST['produit'];
$quantite = $_POST['quantite'];

// ma requête
$req_insert = "INSERT INTO produits (
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