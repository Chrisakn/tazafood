<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description?>">
    <title><?= $title?></title>
    <link rel="shortcut icon" href="../public/assets/images/favicon.ico" style="font-size: 20px" type=" image/x-icon">
    <link href="<?= URL ?>public/css/main.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Charmonman:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6be599f169.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
</head>

<body>
    <!-- header -->
    <header>
        <div class="logo">
            <a href="accueil"><img src="<?= URL ?>public/sources/Fichier 1.svg" alt=""></a>
        </div>
        <!-- Le menu -->
        <?php include("views/commons/menu.php") ?>
        <button class="reserve_btn"><a class="telephone" href="loginAdmin">0 75 83 19 168</a> </button>
        <!-- <button class="reserve_btn"><a class="telephone" href="tel:+33758319168">0 75 83 19 168</a> </button> -->
        <!-- le menu responsive -->
        <div class="toggle_menu"></div>
        <!-- le drop down menu du user -->
    </header>

    <!-- Content -->
    <?= $content ?>
    
    <!-- footer -->
    <footer>
        <div class="services_list">
            <div class="service">
                <img src="<?= URL ?>public/sources/clock.png" alt="">
                <h2>Ouverture</h2>
                <p>11h30 à 14h00</p>
                <p>17h30 à 22h30</p>
            </div>

            <div class="service">
                <img src="<?= URL ?>public/sources/pin.png" alt="">
                <h2>Adresses</h2>
                <p>France-88rue metz</p>
                <p>Longwy</p>
            </div>
            <!-- <div class="service">
                <img src="<?= URL ?>public/sources/email.png" alt="">
                <h2>Emails</h2>
                <p>taza.food@gmail.com</p>
                <p>tazaF.nom@gmail.com</p>
            </div>-->
            <div class="service">
                <img src="<?= URL ?>public/sources/call.png" alt="">
                <h2>Telephone</h2>
                <p>+33 758316168</p>
                <p>+33 758319168</p>
            </div>
            <hr>
        </div>
        <p class="footer_text"><a id="mentions_legales" href="#mentionslegales">Mentions légales</a> | Réalisé par <span>chris kun</span> | Tous les droits sont réservés.</p>
    </footer>
    <script src="<?= URL ?>public/js/main.js"></script>
    <script src="<?= URL ?>public/js/dropdown.js"></script>
    <script src="<?= URL ?>public/js/carousel_apropos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    

</body>

</html>