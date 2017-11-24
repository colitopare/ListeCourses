<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 23/11/2017
 * Time: 14:45
 */
//connection rootà la base de données
require_once 'connexion.php';

// je récupère dans une variable, idProd passer dans url
$id_prod = $_GET['idProd'];

// ma requête
$req_sup = "DELETE FROM `produits` WHERE id_produit = :id_produit";

// prépare la requête
$list_prod_sup = $bdd->prepare($req_sup);

// lie la variable $id_prod définie au-dessus au paramètre :id_produit de la requête préparée
$list_prod_sup->bindValue(':id_produit', $id_prod, PDO::PARAM_INT);

$list_prod_sup->execute();


 ////////////////////////////////////////////
// script jouer dès que le code PHP est executé
////////////////////////////////////////////////

// cachera la ligne du produit cliquer (avec l'id_produit)
echo "$('#id_$id_prod').remove();";

// je vais afficher un message pour dire que tout c'est bien passé
// Je modifie la classe
echo "$('#messAlert').addClass('alert alert-success');";
// je met le message qui va bien
echo "$('#messAlert').prepend('Votre suppression c est bien passé');";
