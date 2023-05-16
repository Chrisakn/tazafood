<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>public/css/cssModificationProduit.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <section class="input_add">
        <form action="" method="POST">
            <a href="genererProduitsAdmin" id="back_btn">
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
            <label>Nom du produit</label>
            <input type="text" name="nom" value="<?php echo $afficheProduitById['nom_produit'] ?>">
            <label>Prix du produit</label>
            <input type="float" name="prix" value="<?php echo $afficheProduitById['prix_produit'] ?>">
            <label>Description du produit</label>
            <textarea name="description" cols="15" rows="5"><?php echo $afficheProduitById['description_produit'] ?></textarea>
            <?php motifCategorie_update(); ?>
            <input type="submit" value="Modifier" id="btn-ajouter" name="validation">
        </form>
    </section>

</body>

</html>