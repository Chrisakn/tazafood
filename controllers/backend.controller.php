<?php
require_once "models/pdo.php"; 
require_once "models/admin.dao.php";
require_once "models/produit.dao.php";
require_once "models/categorie.dao.php";
require_once "config/config.php";
require_once "public/utile/formatage.php"; 

function getPageLogin(){
    $title = "Page de login du site";
    $description = "Page de login";

    if(Securite::verificationAccess()){
        header ("Location: admin");
    }
    $alert = "";
    if(isset($_POST['login']) && !empty($_POST['login']) &&
    isset($_POST['password']) && !empty($_POST['password'])){
        $login = Securite::secureHTML($_POST['login']);
        $password = Securite::secureHTML($_POST['password']);
        if(isConnexionValid($login,$password)){
            $_SESSION['acces'] = "admin";
            Securite::genereCookiePassword();
            header ("Location: admin");
        } else {
            $alert = "Mot de passe invalide";
        }
    }

    require_once "views/back/loginAdmin.view.php";
}

function getPageAdmin(){
    if(isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true"){
        session_destroy();
        header("Location: accueil");
    }

    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $title = "Page d'administration du site";
        $description = "Page d'administration du site";
        

        $categories = getCategorie();
        $produits = getProduit();

        require_once "views/back/produit.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}

function getPageProduitsAdmin(){
    if(isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true"){
        session_destroy();
        header("Location: accueil");
    }
    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $title = "Page de gestion des produit";
        $description = "Page de gestion des produits";

        $categories = getCategorie();
        $produits = getProduit();

        
        require_once "views/back/produit.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}

function ajoutProduitBdd(){

    // Vérification des données du formulaire
    if(isset($_POST['nom']) && !empty($_POST['nom']) &&
    isset($_POST['prix']) && !empty($_POST['prix']) &&
    isset($_POST['motifCategories'])) {
    $nom = Securite::secureHTML($_POST['nom']);
    $prix = Securite::secureHTML($_POST['prix']);
    $description = Securite::secureHTML($_POST['description']);
    $categorie = Securite::secureHTML($_POST['motifCategories']);

    try {
        $produit = selectProduitByName($nom);

        if ($produit == null) {
            // Ajout du produit
            $message = ajoutProduit($categorie, $nom, $prix, $description);
            return $message = '<p style="color:green">Produit ajouté ! </p>';
        } else {
            return $message = '<p style="color:red ">Le produit existe déjà !</p>';
        }
    } catch(Exception $e){
        $message = "<p style='color:red' >Un problème est survenu lors de l'ajout</p> <br />". $e->getMessage();
    }
} else {
    return $message = '<p style="color:red ">Tous les champs sont obligatoires !</p>';
}
  
}

function getPageProduitsAdminAjout(){

    
    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $title = "Ajout d'un nouveau produit";
        $description = "Page d'ajout des nouveaux produits";

        $message = ajoutProduitBdd();

        
        require_once "views/back/ajoutProduit.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }

}


function modifProduitBdd() {
    if (isset($_GET['idProduit']) && isset($_POST['nom_UpdateProd']) && isset($_POST['prix_UpdateProd']) && isset($_POST['description_UpdateProd']) && isset($_POST['validation'])) {
        $idProduit = $_GET['idProduit'];
        $nom = $_POST['nom_UpdateProd'];
        $prix = $_POST['prix_UpdateProd'];
        $description = $_POST['description_UpdateProd'];
        $categorie = $_POST['catMotifUpdate'];

        if (!empty($nom)) {
            modifProduit($idProduit, $categorie, $nom, $prix, $description);
            return '<p style="color:green">Produit bien modifié! </p>';
        } else {
            return '<p style="color:red">Produit Non modifié!</p>';
        }
    }
}

function getPageProduitsAdminModif() {
    if (Securite::verificationAccess()) {
        Securite::genereCookiePassword();
        $title = "Modification d'un produit";
        $description = "Page de modification d'un produit";

        // $message = modifProduitBdd();

        if(isset($_GET['idProduit'])){
            $afficheProduitById = getProduitById($_GET['idProduit']);
            $afficheCategorieById = getCategorieById($afficheProduitById['ID_categorie']);
        }
        require_once "views/back/modifProduit.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}
