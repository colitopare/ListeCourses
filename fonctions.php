<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 24/11/2017
 * Time: 08:49
 */


//connection rootà la base de données
require_once 'connexion.php';

/////////////////////////////////////////
//   !   ATTENTION  !      //////////////
// bien faire :
// include 'fonctions.php';
// en haut des fichiers où j'ai besoin d'une de mes fonctions créées ici
/////////////////////////////////////////////


// controler le nbre minimum de caractère
// @param $var, la variable à tester
// @param $tailleMin nbre de caractère mini qu'on veut
// return False ou true
function tailleMinVar($var, $tailleMin = 0) {
    if (!isset($var)) {
        error_log('valeur non défini');
        return false;
    } elseif (strlen($var) < $tailleMin){
        return false;
    } else {
        return true;
    }
}


// Nettoie et valide les valeur en fonction de son type
function TestTypeValeur($valeurTester, $type){
    switch ($type) {
        case INT:
            // Filtre nettoyage
            //Supprime tous les caractères sauf les chiffres, et les signes plus et moins.
            $typeNettoyer = filter_var($valeurTester,FILTER_SANITIZE_NUMBER_INT);
            // Filtre validation
            // Valide un entier, éventuellement dans un intervalle donné et le convertie en entier en cas de succès.
            $typeRetourTest = filter_var($typeNettoyer, FILTER_VALIDATE_INT);
            return $typeRetourTest;
        case STRING:
            $typeRetourTest = filter_var($valeurTester, FILTER_SANITIZE_STRING);
            return $typeRetourTest;
        case EMAIL:
            $typeNettoyer = filter_var($valeurTester, FILTER_SANITIZE_EMAIL);
            $typeRetourTest = filter_var($typeNettoyer, FILTER_VALIDATE_EMAIL);
            return $typeRetourTest;
    }
}

function updateFaitProduit($valFait, $idProd){
    // ma requete
    $req_update_fait = "UPDATE produits 
                    SET fait = $valFait WHERE id_produit = :id_produit";
    // prépare la requête
    $prod_update = $bdd->prepare($req_update_fait);

    // lie la variable $id_prod définie au-dessus au paramètre :id_produit de la requête préparée
    $prod_update->bindValue(':id_produit', $idProd, PDO::PARAM_INT);

    return $prod_update->execute();
}


function nbre($requete){

    global $bdd;
    $sum_prod_tot = $bdd->prepare($requete);
    if ($sum_prod_tot->execute()){
        $lignes_sum_prod = $sum_prod_tot->fetchAll();

        $sum = 0;
        foreach ($lignes_sum_prod as $row){
            $sum += $row['sumProd'];
            return $sum;
        }
    }
}