<?php
include 'header.php';

//connection rootà la base de données
require_once 'connexion.php';

include 'fonctions.php';

?>

    <!--contenu de la page-->
    <main class="container">

        <div id="messAlert" class="alert" role="alert">

        </div>

        <div class="row align-items-center">
            <table class="table table-striped table-responsive col-9">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th id="produit" scope="col">
                        <i class="fa fa-arrow-down trieCroissant" aria-hidden="true"></i>
                        Articles
                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                    </th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th id="quantite" scope="col">Quantité</th>
                    <th scope="col"></th>
                    <th id="fait" scope="col">
                        <i class="fa fa-arrow-down trieCroissant" aria-hidden="true"></i>
                        Pris
                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                    </th>
                    <th id="modif" scope="col"></th>
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
                        echo "<tr id='id_" . $row['id_produit'] . "'>";
                        echo "<td><i data-id='" . $row['id_produit'] . "' class='fa fa-trash checkSup' aria-hidden='true'></i></td>";
                        echo "<td id='replaceProd'>" . $row['produit'] . "</td>";
                        echo "<td id='replaceButton'
                                data-idProd='" . $row['id_produit'] . "' data-prod='" . $row['produit'] . "'>
                                <i class='fa fa-pencil-square-o checkModif' aria-hidden='true'></i>
                             </td>";
                        echo "<td><i action='moins' data-moins='" . $row['id_produit'] . "' class='fa fa-minus-square-o moins' aria-hidden='true'></i></td>";
                        echo "<td class='text-center'>" . $row['quantite'] . "</td>";
                        echo "<td><i action='plus' data-plus='" . $row['id_produit'] . "' class='fa fa-plus-square-o plus' aria-hidden='true'></i></td>";
                        // en fonction du contenu de fait affichera la case cochet ou pas
                        $classSup = ($row['fait'] == 0 ? 'fa-square-o' : 'fa-check-square-o ');
                        echo "<td><i data-check='" . $row['id_produit'] . "' class='fa " . $classSup . " checkFait' aria-hidden='true'></i></td>";
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>

            <button id="creerProd" type="button" class="btn btn-success mr-5" data-toggle="modal"
                    data-target="#article">
                Rajouter un article
            </button>

            <!-- Modal -->
            <div class="modal fade" id="article" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formProduit" class="container" method="post" action="">
                                <div class="form-group">
                                    <label for="produit">Article</label>
                                    <input type="texte" name="produit" class="form-control" id="produit">
                                </div>
                                <div class="form-group">
                                    <label for="quantite">Quantité</label>
                                    <input type="texte" name="quantite" class="form-control" id="quantite">
                                </div>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                <button id="submitForm" type="submit" class="btn btn-success float-right"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        //// Faire la somme du nombre total de produits à acheter
        $req_sum = "SELECT SUM(quantite) AS sumProd FROM produits";
        echo "<p id='total'>Le nombre total d'articles à acheter est de  : <span>" . nbre($req_sum) . "</span></p><br/>";

        //// Faire la somme du nombre de produits (dont fait = 0) qui reste à acheter
        $req_prods_rest = $req_sum . " WHERE fait = 0";
        if (nbre($req_prods_rest) !== 0) {
            echo "<p id='reste'>Il vous reste  <span>" . nbre($req_prods_rest) . "</span> d'articles à acheter</p>";
        } else {
            echo "<p>Il n'y a plus d'article à acheter</p>";
        }
        ?>

    </main>


<?php
include 'footer.php';
?>