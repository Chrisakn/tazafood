<?php 
require_once "models/pdo.php"; 
require_once "models/produit.dao.php";
require_once "models/categorie.dao.php";
require_once "config/config.php";
require_once "public/utile/formatage.php"; 

function getPageAccueil(){
    $title = "Page d'accueil";
    $description = "TazaFood restauration rapide";
    require_once "views/front/accueil.view.php";
}

function getPageCarte(){
    $title = "La carte ";
    $description = "Nos plats";
    $produits = getProduit();
    require_once "views/front/carte.view.php";
}

function getPageApropos(){
    $title = "A propos";
    $description = "A propos de notre restaurant";
    require_once "views/front/apropos.view.php";
}
function getPageService(){
    $title = "Nos services";
    $description = "Les services du restaurant";
    require_once "views/front/service.view.php";
}
function getPageContact(){
    $title = "La page de contact";
    $description = "La page de contact";

    require_once "views/front/contact/contact.view.php";
}
