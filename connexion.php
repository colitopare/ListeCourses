<?php
/**
 * Created by PhpStorm.
 * User: Muriel
 * Date: 23/11/2017
 * Time: 10:02
 */

// CONNEXION À LA BASE DE DONNÉES ET SELECTION D'UNE BASE DE DONNÉES
// ouvrir une connexion à notre bdd mysql ET se connecter à la base "demo" | connexion à l'aide de PDO
try {
    $bdd= new PDO('mysql:host=localhost;dbname=liste_courses', 'root', 'root');
    $bdd->exec('SET NAMES utf8'); // pour éviter les problèmes d'encodage
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
};