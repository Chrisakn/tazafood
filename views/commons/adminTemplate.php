<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description?>">
    <title><?= $title?></title>
    <link href="<?= URL ?>public/css/adminMainCssTemplate.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <div class="logo">
                        <a><img src="<?= URL ?>public/sources/Fichier 1.svg" alt="logo du site"></a>
                    </div>
                </li>

                <li>
                    <a href="genererProduitsAdmin">
                        <span class="icon">
                            <ion-icon name="download"></ion-icon>
                        </span>
                        <span class="title">Produits</span>
                    </a>
                </li>



                <li>
                    <a href="genererCategoriesAdmin">
                        <span class="icon">
                            <ion-icon name="download"></ion-icon>
                        </span>
                        <span class="title">Categories</span>
                    </a>
                </li>

                <li>
                    <a href="genererMessagesAdmin">
                        <span class="icon">
                            <ion-icon name="archive"></ion-icon>
                        </span>
                        <span class="title">Boite de reception</span>
                    </a>
                </li>

                <li>
                    <a href="accueil">
                        <span class="icon">
                            <ion-icon name="log-in"></ion-icon>
                        </span>
                        <span class="title">Retour à l'accueil</span>
                    </a>
                </li>

                
             
                <form method="POST" style="cursor : pointer">
                    <input type='hidden' name='deconnexion' value="true" />
                    <input type="submit" class="btn_deconnexion" value="se déconnecter" />
                </form>
                
                

            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


                <div class="user">
                    <img src="<?= URL ?>public/sources/undraw_female_avatar_re_uk8y.svg" alt="">
                </div>
            </div>
            <!-- ================ Order Details List ================= -->
            
            <?= $content ?>

        </div>
    </div>

    </div>
    <!-- =========== Scripts =========  -->
    <script src="<?= URL ?>public/js/adminMainJs.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>