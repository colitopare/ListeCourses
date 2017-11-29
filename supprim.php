<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 23/11/2017
 * Time: 14:45
 */
//connection rootà la base de données
require_once 'connexion.php';

include 'fonctions.php';

// je récupère dans une variable, idProd passer dans url
$id_prod = $_GET['idProd'];

// ma requête
$req_sup = "DELETE FROM produits WHERE id_produit = :id_produit";

// prépare la requête
$list_prod_sup = $bdd->prepare($req_sup);

// lie la variable $id_prod définie au-dessus au paramètre :id_produit de la requête préparée
$list_prod_sup->bindValue(':id_produit', $id_prod, PDO::PARAM_INT);

$list_prod_sup->execute();

//le retour va se faire en callback dans la fonction AJAX

$req_sum = "SELECT SUM(quantite) AS sumProd FROM produits";
echo nbre($req_sum);