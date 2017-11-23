<?php
include 'header.php';

//connection rootà la base de données
require_once 'connexion.php';
?>

    <!--contenu de la page-->
    <main class="container">


        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Pris</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $req_prods = "SELECT * FROM produits";

            // prépare la requête
            $list_produits = $bdd->prepare($req_prods);

            if ($list_produits->execute()) {
                $lignes_produits = $list_produits->fetchAll();
                foreach ($lignes_produits as $row) {
                    echo "<tr>";
                    echo "<td><i id=\"supprimer\" class=\"fa fa-trash chekSup\" aria-hidden=\"true\"></i> ". $row['produit'] ."</td>";
                    echo "<td>". $row['quantite'] ."</td>";
                    if ($row['fait'] == 0){
                         echo "<td><i class=\"fa fa-square-o chekFait\" aria-hidden='true'></i></td>";
                    }else{
                        echo "<td><i class=\"fa fa-check-square-o chekFait\" aria-hidden='true'></i></td>";
                    }
                    echo "</tr>";
                }

            }
            ?>
            </tbody>
        </table>
        <?php
        if ($list_produits->execute()) {
            $lignes_produits = $list_produits->fetchAll();
            echo "Vous avez " . count($lignes_produits) . " de produits à acheter <br/>";
        }

        // j'écris la requête
        $req_prods_rest = $req_prods . " WHERE fait = 0";

        // prépare la requête
        $list_prod_rest= $bdd->prepare($req_prods_rest);

        if ($list_prod_rest->execute()) {
            $lignes_produits_reste = $list_prod_rest->fetchAll();
            echo "Il vous reste  " . count($lignes_produits_reste) . " de produits à trouver";
        }
        ?>

        <a class="btn btn-primary float-right" href="formulaireInserrer.php" role="button">Ajouter produit</a>

    </main>


<?php
include 'footer.php';
?>