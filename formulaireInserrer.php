<?php
include 'header.php';

//connection rootà la base de données
require_once 'connexion.php';
?>


<form class="container">
    <div class="form-group">
        <label for="produit">Produit</label>
        <input type="texte" class="form-control" id="produit">
    </div>
    <div class="form-group">
        <label for="quantite">Quantité</label>
        <input type="texte" class="form-control" id="quantite">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>





<?php
include 'footer.php';
?>
