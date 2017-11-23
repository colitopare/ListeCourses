<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 23/11/2017
 * Time: 14:45
 */


$id_prod = $_GET['id'];

$req_sup = "DELETE FROM `produits` WHERE id_produit = :id_produit";

// prépare la requête
$list_prod_sup = $bdd->prepare($req_sup);

// lie la variable $id_prod définie au-dessus au paramètre :id_produit de la requête préparée
$requete->bindValue(':id_produit', $id_prod, PDO::PARAM_INT);

$list_prod_sup->execute();

header("Location: index.php");