<?php
include 'header.php';

//connection rootà la base de données
require_once 'connexion.php';
?>


<form class="container" method="post" action="ajouter.php">
    <div class="form-group">
        <label for="produit">Produit</label>
        <input type="texte" name="produit" class="form-control" id="produit">
    </div>
    <div class="form-group">
        <label for="quantite">Quantité</label>
        <input type="texte" name="quantite" class="form-control" id="quantite">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>


<?php
include 'footer.php';
?>
