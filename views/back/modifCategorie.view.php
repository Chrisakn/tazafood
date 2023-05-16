<?php
include_once('../../traitement/backoffice_traitement/function-traitement-backoffice.php');
$message =  updateNewCatName($bdd);


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/css-backoffice/crudProd.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Modification du prod</title>
</head>

<body>
    <section class="input_add">
        <form action="" method="POST">
            <a href="../../public/backoffice/index-backoffice.php" id="back_btn">
                <i class="fas fa-chevron-circle-left"></i>
                Retour
            </a>
            <div class="message">
                <?php
                if (isset($message)) {
                    //si la variable message existe , on affiche le contenu de la variable
                    echo $message;
                }

                ?>
            </div>
            <label><span>[Nouveau]</span> Nom du produit</label>
            <input type="text" name="nom_UpdateCat" value="">
            <input type=" submit" value="Modifier" id="btn-ajouter" name="validation">
        </form>
    </section>

</body>

</html>