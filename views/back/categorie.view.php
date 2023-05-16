<?php
$cat = getCategorie($bdd);

?>
<div class="details">
    <div class="recentOrders">
        <!--<button class="btn-prod"><a href="">Ajouter une nouvelle categorie</a></button>-->
        <div class="cardHeader">
            <h1>MES CATEGORIES</h1>

        </div>
        <hr>

        <table class="table-categorie">
            <thead>
                <tr>
                    <td>Nom</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>

                <?php
                if ($cat != null) {
                    foreach ($cat as $dataCat) {
                        echo "
                        <tr>
                            <td>$dataCat[nom_categorie]</td>
                            <td>
                                <button class='btn-cat'><a href='../../vue/backoffice-vue/updateCat.php?idCatego=$dataCat[ID_categorie]'>Modifier</a></button>
                                
                            </td>
                        </tr>";
                    }
                }
                ?>

            </tbody>
        </table>
        <!--<button class='btn-cat'><a href=''>Supprimer</a></button>-->
    </div>
</div>