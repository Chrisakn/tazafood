<?php
include_once('../../traitement/backoffice_traitement/function-traitement-backoffice.php');
// deleteProduitById($bdd, $idProdDelete);

$showProd = getProduitById($bdd, $_GET['idProdDelete']);

$test = getCategorieById($bdd, $showProd['ID_categorie']);

if (isset($_POST['supp_send'])) {
    deleteProduitById($bdd, $idProdDelete);
    header('Location: ../../public/backoffice/index-backoffice.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/css-backoffice/deleteCss.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div id="popup-message">
        <div id="popup-box">
            <a href="../../public/backoffice/index-backoffice.php">
                <i class="fas fa-times close-btn"></i>
            </a>
            <h1 id="title">Suppression</h1>

            <form action="" method="POST">
                <p id="text_sup1">Etes vous sur de vraiment vouloir supprimer ce produit : </p>
                <ul>
                    <li>Nom du produit : <span><?php echo $showProd['nom_produit'] ?></span></li>
                    <li>Prix du produit : <span><?php echo $showProd['prix_produit'] ?> €</span></li>
                    <li>Description du produit : <span><?php echo $showProd['description_produit'] ?></span></li>
                    <li>Nom de la categorie : <span><?php echo $test['nom_categorie'] ?></span></li>
                </ul>
                <input type="submit" id="btn_sup" name="supp_send" value="supprimer">
            </form>
        </div>
    </div>
    <script src="../../public/assets/js/js-backoffice/deleteJs.js"></script>
</body>

</html>