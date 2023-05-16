<?php
require_once "pdo.php";
require_once "produit.dao.php";

// -------------------------Toutes mes fonctions en rapport avec ma table "Categorie"--------------------------------
/**
 * 
 * une fonction pour selectionner les categories de la table categorie (dans la bdd)
 */
function getCategorie()
{
    $bdd = connexionPDO();
    $req = 'SELECT * FROM categorie';
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $categorie = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $categorie;
}
/**
 * 
 * une fonction pour selectionner les categories de la table categorie (dans la bdd)
 */
function getCategorieById($id_categorie)
{
    $bdd = connexionPDO();
    $req = "SELECT * FROM categorie WHERE ID_categorie = :id_categorie";
    $stmt = $bdd->prepare($req);
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->execute();
    return $stmt->fetch();
}
// ------------------------------------------------------------------------------------------------------------------
/**
 * menu deroulant des motifs pour le CRUD backend (categorie)
 *
 * @param [PDO] $bdd
 * @return void
 */
function MotifCategories()
{
    $categories = getCategorie();
    echo "<select  name='motifCategories' id='selectCat'>";
    echo '<option value="day-select">' . "Veuillez selectionner la categorie" . '</option>';
    foreach ($categories as $categorie) {

        echo '<option  value=' . $categorie['ID_categorie'] . '>' . $categorie['nom_categorie'] . '</option>';
    }

    echo '</select>';
}


