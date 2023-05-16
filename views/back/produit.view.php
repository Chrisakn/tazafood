<?php
ob_start(); 
// ici je fais appel à mes fonctions depuis function-traitement-backoffice.php
?>
<div class="details">
    <div class="recentOrders">

        <button class="btn-prod"><a href="genererProduitsAdminAjout">Ajouter un nouveau produit</a></button>

        <!--Voila mon tableau qui mes produit dispatché en categorie bien distinct -->

        <?php foreach ($categories as $categorie) {
        ?>
            <div class="cardHeader">
                <h1> <?php echo $categorie['nom_categorie'] ?> </h1>
            </div>
            <hr>
            <table class="table-produit" id="">
                <thead>
                    <tr>
                        <td>Nom produit</td>
                        <td>Prix</td>
                        <td>Description</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <?php
                if ($produits != null) {
                    foreach ($produits as $produit) { //C'est une boucle
                        if ($produit['ID_categorie'] == $categorie['ID_categorie']) { //c'est pour rassembler chaque produit ayant toute une meme categorie dans un meme bloque
                            echo "
                                <tbody>
                                    <tr>
                                        <td>$produit[nom_produit]</td>
                                        <td>$produit[prix_produit]</td>
                                        <td>$produit[description_produit] </td>
                                        <td>
                                            <button class='btn-produit'><a href='genererProduitsAdminModif?idProduit=$produit[ID_produit]'>Modifier</a></button>
                                            <button class='btn-produit'><a href='genererProduitsAdminSup?idProduitDelete=$produit[ID_produit]'>Supprimer</a></button>
                                            <!--'?idProdDelete' cela me permet d'utiler la methode get en obtenu aussi l'id du produit directement--> 
                                        </td>
                                    </tr>

                                </tbody>";
                        }
                    }
                }
                ?>
            </table>
        <?php
        }
        ?>


    </div>
</div>
<?php
$content = ob_get_clean();
require "views/commons/adminTemplate.php"
?>