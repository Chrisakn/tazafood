<?php
include_once('bdd.php');
// ici je vais créé des fonction en rapport avec ma base de données

// PDOStatement::fetchAll() retourne un tableau contenant toutes les lignes du jeu d'enregistrements. 
//Le tableau représente chaque ligne comme soit un tableau de valeurs des colonnes, soit un objet avec des propriétés correspondant à chaque nom de colonne. 
//Un tableau vide est retourné s'il y a zéro résultat.


// fetch()Récupère une ligne depuis un jeu de résultats associé à l'objet PDOStatement. Le paramètre mode détermine la façon dont PDO retourne la ligne. par exemple fetch(PDO::FETCH_ASSOC);

// -------------------------Toutes mes fonctions en rapport avec ma table "User"--------------------------------
/**
 * 
 * je vais créer une fonction pour inserer des users dans la base de données
 */
function ajoutUtilisateur($bdd, $password, $nom, $prenom, $email, $telephone)
{
    $queryprep = 'INSERT INTO user (ID_user,ID_role,nom_user,prenom_user,telephone_user,email_user,motdepasse_user) VALUES 
    (null,1,:nom,:prenom,:telephone,:email,:motdepasse)';

    $query = $bdd->prepare($queryprep);
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':telephone', $telephone, PDO::PARAM_STR);
    $query->bindValue(':motdepasse', $password, PDO::PARAM_STR);

    $query->execute();
}
/**
 * 
 * une fonction pour obtenir les users de la bdd
 */
function getUsers($bdd)
{
    $userstr = 'SELECT * FROM user ';
    $userquery = $bdd->prepare($userstr);
    $userquery->execute();
    $bdduser = $userquery->fetchall(); //fetchall() est une méthode, elle retourne un tablleau contenant toutes les lignes du jeu d'enregistrements.
    return $bdduser;
}
/**
 * 
 * une fonction pour obtenir les users de la bdd grace au champs nom
 */
function getUsersByName($bdd, $name)
{
    $userstr = 'SELECT * FROM user WHERE nom_user=:nom_user ';
    $userquery = $bdd->prepare($userstr);
    $userquery->bindValue(':nom', $name, PDO::PARAM_STR);
    $userquery->execute();
    $bdduserName = $userquery->fetchall();
    return $bdduserName;
}
/**
 * 
 * une fonction pour obtenir les users de la bdd grace a l'id
 */
function getUsersById($bdd, $id_user)
{
    $str = 'SELECT * FROM user WHERE ID_user = :id';
    $query = $bdd->prepare($str);
    $query->bindValue(':id', $id_user, PDO::PARAM_INT);
    $query->execute();
    return $getUsersById = $query->fetch(); //Récupère une ligne depuis un jeu de résultats associé à l'objet PDOStatement. Le paramètre mode détermine la façon dont PDO retourne la ligne.
}
/**
 * 
 * une fonction pour selectionner les users par leur email
 */
function selectUserByEmail($bdd, $email)
{
    $userstr = 'SELECT * FROM user WHERE email_user=:email_user';
    $userquery = $bdd->prepare($userstr);
    $userquery->bindValue(':email_user', $email, PDO::PARAM_STR);
    $userquery->execute();
    $bdduser = $userquery->fetch();
    return $bdduser;
}
// ------------------------------------------------------------------------------------------------------------------

// -------------------------Toutes mes fonctions en rapport avec ma table "Categorie"--------------------------------
/**
 * 
 * une fonction pour selectionner les categories de la table categorie (dans la bdd)
 */
function getCategorie($bdd)
{
    $catstr = 'SELECT * FROM categorie';
    $catquery = $bdd->prepare($catstr);
    $catquery->execute();
    $bddcat = $catquery->fetchAll();
    return $bddcat;
}
/**
 * 
 * une fonction pour selectionner les categories de la table categorie (dans la bdd)
 */
function getCategorieById($bdd, $cat_produit)
{
    $catstr = 'SELECT * FROM categorie WHERE ID_categorie = :ID_categorie';
    $catquery = $bdd->query($catstr);
    return $catquery->fetch();
}
// ------------------------------------------------------------------------------------------------------------------

// -------------------------Toutes mes fonctions en rapport avec ma table "Reservation"--------------------------------
/**
 * 
 * une fonction pour selectionner ou obtenir mes motifs de reservation qui se trouve dans la table motif_reservation(bdd)
 */
function selectMotifReservation($bdd)
{
    $motifstr = 'SELECT * FROM motif_reservation ';
    $motifquery = $bdd->prepare($motifstr);
    $motifquery->execute();
    $bddmotif = $motifquery->fetchall();
    return $bddmotif;
}
/**
 * 
 * 
 * une function pour l'insertion d'une reservation
 */
function InsertReservation($bdd, $id_user, $id_motif, $nbr_personne, $date_reservation, $heure_reservation, $nom_reservation, $telephone_reservation, $email_reservation, $motif_reservation)
{
    $reservationStr = "INSERT INTO reservation (ID_reservation, ID_user, ID_motif, nom_reservation, email_reservation, phone_reservation, heure_reservation, date_reservation, nbre_personne_reservation,message_reservation)

    VALUES (NULL, :ID_user, :ID_motif, :nom_reservation,:email_reservation,:phone_reservation, :heure_reservation, :date_reservation, :nbr_pers_res, :message_res)";

    $reservquery = $bdd->prepare($reservationStr);
    $reservquery->bindValue(':ID_user', $id_user['ID_user'], PDO::PARAM_INT);
    $reservquery->bindValue(':ID_motif', $id_motif, PDO::PARAM_INT);
    $reservquery->bindValue(':nom_reservation', $nom_reservation, PDO::PARAM_STR);
    $reservquery->bindValue(':email_reservation', $email_reservation, PDO::PARAM_STR);
    $reservquery->bindValue(':phone_reservation', $telephone_reservation, PDO::PARAM_STR);
    $reservquery->bindValue(':heure_reservation', $heure_reservation, PDO::PARAM_STR);
    $reservquery->bindValue(':date_reservation', $date_reservation, PDO::PARAM_STR);
    $reservquery->bindValue(':nbr_pers_res', $nbr_personne, PDO::PARAM_STR);
    $reservquery->bindValue(':message_res', $motif_reservation, PDO::PARAM_STR);

    $reservquery->execute();
}
// ------------------------------------------------------------------------------------------------------------------

// -------------------------Toutes mes fonctions en rapport avec ma table "Contact"--------------------------------
/**
 * 
 * une fonction pour inserer les contats dans la bdd
 */
function insertContact($bdd, $nom_contact, $email_contact, $telephone_contact, $message_contact)
{
    $queryCont = 'INSERT INTO contact (ID_contact, nom_contact, email_contact, telephone_contact, message_contact, created_at) VALUES
    (null, :nom_contact, :email_contact, :telephone_contact, :message_contact,NOW())';

    $query = $bdd->prepare($queryCont);
    $query->bindValue(':nom_contact', $nom_contact, PDO::PARAM_STR);
    $query->bindValue(':email_contact', $email_contact, PDO::PARAM_STR);
    $query->bindValue(':telephone_contact', $telephone_contact, PDO::PARAM_STR);
    $query->bindValue(':message_contact', $message_contact, PDO::PARAM_STR);

    $query->execute();
}
/**
 * 
 * une fonction pour obtenir les contacts
 */
function getContact($bdd)
{
    $contactstr = 'SELECT * FROM contact ';
    $contactquery = $bdd->prepare($contactstr);
    $contactquery->execute();
    $bddcontact = $contactquery->fetchall();
    return $bddcontact;
}
/**
 *  
 * une fonction pour modifier(update) un produit
 */
function updateCategorieName($bdd, $idCatego, $nom_categorie)
{
    $queryStr = 'UPDATE categorie SET nom_categorie= :nom_categorie WHERE ID_categorie=:idCatego';
    $query = $bdd->prepare($queryStr);
    $query->bindValue(':idCatego', $idCatego, PDO::PARAM_INT);
    $query->bindValue(':nom_categorie', $nom_categorie, PDO::PARAM_STR);
    $query->execute();
}
// ------------------------------------------------------------------------------------------------------------------

// -------------------------Toutes mes fonctions en rapport avec ma table "Produit"--------------------------------
/**
 * une fonction pour ajouter des nouveau produits
 * 
 */
function insertProduit($bdd, $cat_produit, $nom_produit, $prix_produit, $description_produit)
{
    $produitprep = "INSERT INTO `produit` (`ID_produit`, `ID_categorie`, `nom_produit`, `prix_produit`, `description_produit`)
    VALUES (NULL, :ID_cat, :nom_produit, :prix_produit, :descrip_produit)";
    $prodquery = $bdd->prepare($produitprep);
    $prodquery->bindValue(':ID_cat', $cat_produit, PDO::PARAM_INT);
    $prodquery->bindValue(':nom_produit', $nom_produit, PDO::PARAM_STR);
    $prodquery->bindValue(':prix_produit', $prix_produit, PDO::PARAM_STR);
    $prodquery->bindValue(':descrip_produit', $description_produit, PDO::PARAM_STR);
    $prodquery->execute();
}

/**
 * 
 * 
 * une fonction pour modifier(update) un produit
 */
function updateProduit($bdd, $idProd, $cat_produit, $nom_produit, $prix_produit, $description_produit)
{
    $queryStr = 'UPDATE produit SET ID_categorie= :ID_cat, nom_produit= :nom_produit, 
    prix_produit= :prix_produit, description_produit= :description_produit
     WHERE ID_produit=:idProd';
    $query = $bdd->prepare($queryStr);
    $query->bindValue(':idProd', $idProd, PDO::PARAM_INT);
    $query->bindValue(':ID_cat', $cat_produit, PDO::PARAM_INT);
    $query->bindValue(':nom_produit', $nom_produit, PDO::PARAM_STR);
    $query->bindValue(':prix_produit', $prix_produit, PDO::PARAM_STR);
    $query->bindValue(':description_produit', $description_produit, PDO::PARAM_STR);
    $query->execute();
}
/**
 * 
 * une fonction pour supprimer un produit par son Id
 */
function deleteProdById($bdd, $idProdDelete)
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
function getProduitById($bdd, $getProd)
{
    $prodStr = 'SELECT * FROM produit WHERE ID_produit = :ID_produit';
    $prodquery = $bdd->prepare($prodStr);
    $prodquery->bindValue(':ID_produit', $getProd, PDO::PARAM_INT);
    $prodquery->execute();
    return $updateProduitById = $prodquery->fetch();
}
/**
 * 
 * une fonction pour selectionner les produit de la table produit (dans la bdd)
 */
function getProduit($bdd)
{
    $selectStr = 'SELECT * FROM produit ORDER BY nom_produit ASC';
    $selectQuery = $bdd->query($selectStr);
    $bddArray = $selectQuery->fetchAll();
    return $bddArray;
}

/**
 * une fonction pour selectionner les produit de la table produit par son nom
 * 
 */
function selectProduitByName($bdd, $nom_produi)
{
    $catstr = 'SELECT * FROM produit WHERE nom_produit=:nom_produit';
    $catquery = $bdd->prepare($catstr);
    $catquery->bindValue(':nom_produit', $nom_produi, PDO::PARAM_STR);
    $catquery->execute();
    $bddprod = $catquery->fetch();
    return $bddprod;
}
// ------------------------------------------------------------------------------------------------------------------
