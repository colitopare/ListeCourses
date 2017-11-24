<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 24/11/2017
 * Time: 08:49
 */

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