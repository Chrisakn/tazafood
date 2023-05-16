<?php
require_once "pdo.php";
require_once "categorie.dao.php";

// -------------------------Toutes mes fonctions en rapport avec ma table "Produit"--------------------------------
/**
 * une fonction pour ajouter des nouveau produits
 * 
 */
function ajoutProduit($categorie, $nom, $prix, $description)
{
    $bdd = connexionPDO();
    $req = 'INSERT INTO `produit` (`ID_produit`, `ID_categorie`, `nom_produit`, `prix_produit`, `description_produit`)
    VALUES (NULL, :ID_cat, :nom_produit, :prix_produit, :descrip_produit)';
    $ajoutProduit = $bdd->prepare($req);
    $ajoutProduit->bindValue(':ID_cat', $categorie, PDO::PARAM_INT);
    $ajoutProduit->bindValue(':nom_produit', $nom, PDO::PARAM_STR);
    $ajoutProduit->bindValue(':prix_produit', $prix, PDO::PARAM_STR);
    $ajoutProduit->bindValue(':descrip_produit', $description, PDO::PARAM_STR);
    $ajoutProduit->execute();
}

/**
 * 
 * 
 * une fonction pour modifier(update) un produit
 */
function modifProduit($idProduit, $categorie, $nom, $prix, $description)
{
    $bdd = connexionPDO();
    $req = 'UPDATE produit SET ID_categorie= :ID_cat, nom_produit= :nom_produit, 
    prix_produit= :prix_produit, description_produit= :description_produit
     WHERE ID_produit=:idProduit';
    $query = $bdd->prepare($req);
    $query->bindValue(':idProduit', $idProduit, PDO::PARAM_INT);
    $query->bindValue(':ID_cat', $categorie, PDO::PARAM_INT);
    $query->bindValue(':nom_produit', $nom, PDO::PARAM_STR);
    $query->bindValue(':prix_produit', $prix, PDO::PARAM_STR);
    $query->bindValue(':description_produit', $description, PDO::PARAM_STR);
    $query->execute();
}
/**
 * 
 * une fonction pour supprimer un produit par son Id
 */
function deleteProduitById( $idProdDelete)
{
    $deleteInt = 'DELETE FROM produit WHERE ID_produit = :idProdDelete';
    $query = $bdd->prepare($deleteInt);
    $query->bindValue(':idProdDelete', $idProdDelete, PDO::PARAM_INT);
    $query->execute();
}
/**
 * 
 * une fonction pour obtenir un produit par son Id
 */
function getProduitById($id_produit)
{
    $bdd = connexionPDO();
    $req = 'SELECT * FROM produit WHERE ID_produit = :ID_produit';
    $produit = $bdd->prepare($req);
    $produit->bindParam(':ID_produit', $id_produit, PDO::PARAM_INT);
    $produit->execute();
    $produitById = $produit->fetch();
    return $produitById;
}

/**
 * 
 * une fonction pour selectionner les produit de la table produit (dans la bdd)
 */
function getProduit()
{
    $bdd = connexionPDO();
    $req = ' SELECT * FROM produit ORDER BY nom_produit ASC ';
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $produit = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $produit;
}

/**
 * une fonction pour selectionner les produit de la table produit par son nom
 * 
 */
function selectProduitByName($nom)
{
    $bdd = connexionPDO();
    $req = 'SELECT * FROM produit WHERE nom_produit=:nom_produit';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':nom_produit', $nom, PDO::PARAM_STR);
    $stmt->execute();
    $produitByName = $stmt->fetch();
    return $produitByName;
}
// ------------------------------------------------------------------------------------------------------------------
/**
 * menu deroulant des motifs(update) pour le CRUD backend utiliser pour le update du produit
 *
 * @param [PDO] $bdd
 * @return void
 */
function motifCategorie_update()
{
    if (isset($_GET['idProduit'])) {
        $afficheProduitById = getProduitById($_GET['idProduit']);
        $afficheCategorieById = getCategorieById($afficheProduitById['ID_categorie']);

        $categories = getCategorie();
        echo "<select name='catMotifUpdate' id='selectCat'>";
        echo '<option value="' . $afficheProduitById['ID_categorie'] . '">' . $afficheProduitById['nom_categorie'] . '</option>';
        foreach ($categories as $categorie) {
            echo '<option value="' . $categorie['ID_categorie'] . '">' . $categorie['nom_categorie'] . '</option>';
        }
        echo '</select>';
    
    }
   
    
}