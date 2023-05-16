<?php
include_once('../models/function_bdd.php');
//cette ligne de code me permet d'inclure ma page qui contient la connexion à ma base de donnée sans celle-ci mes fonctions ne pourront pas être opérationnelle

// -------------------------Toutes mes fonctions en rapport avec mon "User" et verfication(recaptcha aussi)--------------------------------

/**
 * une function pour l'inscription
 *
 * @param PDO $bdd
 * @return void
 */
function inscription($bdd)
{
    $cool = false;

    if (isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['numero']) && isset($_POST['mot_de_passe']) && isset($_POST['mot_de_passe_confirm'])) {
        $motdepasse = $_POST['mot_de_passe'];
        $nom = strip_tags($_POST['nom']); //strip_tags permet de supprimer les balises HTML, XML et PHP d'une chaîne de caractères.
        $prenom = strip_tags($_POST['prenom']);
        $email = strip_tags($_POST['email']);
        $numero = $_POST['numero'];
        $email = str_replace(' ', '', $email);
        $emailvalid = isValidEmail($email); //function 
        if ($emailvalid == true) {
            if ($_POST['mot_de_passe'] == $_POST['mot_de_passe_confirm']) {

                $bdduser = getUsers($bdd); //Une function de la bdd
                foreach ($bdduser as $resultat) {
                    if ($email == $resultat['email_user']) {
                        $cool = true;
                    }
                }

                $password = password_hash($motdepasse, PASSWORD_BCRYPT); //C'est pour crypter le mot de passe

                if ($cool == false) {

                    $recaptchaVerif = validRecaptcha();
                    if ($recaptchaVerif == true) {
                        ajoutUtilisateur($bdd, $password, $nom, $prenom, $email, $numero); //Une function de la bdd
                        // include_once('../vue/reservation.php');
                    } else {
                        return $messageIscription = '<p style="color:red; font-size: 15px; text-align : center;" >Veuillez réessayer votre inscription !<br>Et n\'oubliez pas de cochez la case "je ne suis pas un robot",</p>';
                    }
                }
            } else {
                return $messageIscription = '<p style="color:red; font-size: 15px; text-align : center;" >Mot de passe incorrect!<br>veuillez réessayer votre inscription !</p>';
            }
        } else {
            return $messageIscription = '<p style="color:red; font-size: 15px; text-align : center;" >Email invalid!<br>veuillez réessayer votre inscription !</p>';
        }
    }
}

/**
 * 
 * nous allons créer une function pour la connexion d'un user
 */
function connexion($bdd)
{
    if (isset($_POST['connexion'])) {
        $email = strip_tags($_POST['email']);
        $motdepasse = $_POST['mot_de_passe'];

        $bdduser = selectUserByEmail($bdd, $email); //Une function de la bdd
        if ($bdduser == false) {
            return $messageConnex = '<p style="color:red; font-size: 15px;" >identifiant inexistant !</p>';
        } else {

            $passwordHash = $bdduser['motdepasse_user'];
            $password = password_verify($motdepasse, $passwordHash);

            if ($password == true) {
                $_SESSION['user']['ID_role'] = $bdduser['ID_role'];
                $_SESSION['user']['email_user'] = $email['email_user'];
                $_SESSION['user']['ID_user'] = $bdduser['ID_user'];
                $_SESSION['user']['nom_user'] = $bdduser['nom_user'];
                $_SESSION['user']['prenom_user'] = $bdduser['prenom_user'];
                header('Location: ../public/index.php');
            } else {
                return $messageConnex = '<p style="color:red; font-size: 15px;" >Mot de passe incorrect!</p>';
            }
        }
    }
}

/**
 * 
 * une function pour la validité de l'email
 */
function isValidEmail($email)
{
    if (preg_match(" /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,4}$/ix", $email)) {
        return true;
    } else {
        return false;
    }
}

/**
 * 
 * nous allons créer une function pour le recaptcha 
 */
function validRecaptcha()
{
    require_once '../recaptcha/autoload.php';
    if (isset($_POST['inscrire'])) {


        if (isset($_POST['g-recaptcha-response'])) {
            $recaptcha = new \ReCaptcha\ReCaptcha('6LcJbncjAAAAAPLcj6aZKPsvQaNN6ubXN7L4oOHS');
            $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
            // var_dump($resp);
            if ($resp->isSuccess()) {
                // var_dump('Captcha valid');
                return true;
            } else {
                $errors = $resp->getErrorCodes();
                return false;
                // var_dump('captcha invalid');
                // var_dump($errors);
            }
        } else {
            // var_dump('captcha non rempli');
        }
    }
}
// ------------------------------------------------------------------------------------------------------------------

// -------------------------Toutes mes fonctions en rapport avec "categorie"--------------------------------

/**
 * menu deroulant des motifs
 *
 * @param [PDO] $bdd
 * @return void
 */
function categorie_motif($bdd)
{
    $bddmotif = selectMotifReservation($bdd);
    echo "<select  name='motif_res' id='heure2'>";
    echo '<option value="day-select">' . "Veillez selectionner un motif(facultatif)" . '</option>';
    foreach ($bddmotif as $resultatmotif) {

        echo '<option value=' . $resultatmotif['ID_motif'] . '>' . $resultatmotif['nom_motif'] . '</option>';
    }

    echo '</select>';
}
// ------------------------------------------------------------------------------------------------------------------

// -------------------------Toutes mes fonctions en rapport avec "reservation"--------------------------------

/**
 * 
 * une function pour l'insertion d'une reservation
 */
function ajoutReservation($bdd)
{
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {

        if (isset($_POST['nom_res'])) {

            $userId = getUsersById($bdd, $_SESSION['user']['ID_user']);
            $nbr_personne = $_POST['nbr_personne'];
            $date_reservation = $_POST['date_reservation'];
            $heure_reservation = $_POST['heure_reservation'];
            $id_motif = $_POST['motif_res'];
            $motif_reservation = $_POST['message_res'];
            $nom_reservation = $_POST['nom_res'];
            $telephone_reservation =  $_POST['telephone_res'];
            $email_reservation = $_POST['email_res'];

            // $bdduserId = getUsersById($bdd, $_SESSION['user']['ID_user']);
            // if ($bdduserId == null) {
            // }
            InsertReservation($bdd, $userId, $id_motif, $nbr_personne, $date_reservation, $heure_reservation, $nom_reservation, $telephone_reservation, $email_reservation, $motif_reservation);
            header('Location: ../public/index.php');
        }
    }
}
// ------------------------------------------------------------------------------------------------------------------

// -------------------------Toutes mes fonctions en rapport avec "contact"--------------------------------

/**
 * 
 * nous allons créer une function pour l'insertion d'un message(contact) 
 */
function ajoutContact($bdd)
{
    if (isset($_POST['email_contact']) && isset($_POST['nom_contact']) && isset($_POST['telephone_contact']) && isset($_POST['message_contact'])) {

        $nom_contact = strip_tags($_POST['nom_contact']); //strip_tags permet de supprimer les balises HTML, XML et PHP d'une chaîne de caractères.
        $email_contact = strip_tags($_POST['email_contact']);
        $email_contact = str_replace(' ', '', $email_contact);
        $email_contactValid = isValidEmail($email_contact);
        $telephone_contact = preg_replace("#[^0-9]#", "", $_POST['telephone_contact']);
        $message_contact = strip_tags($_POST['message_contact']);

        if ($email_contactValid == true) {
            insertContact($bdd, $nom_contact, $email_contact, $telephone_contact, $message_contact);
            include('../vue/repSuccesContact.php');
        } else {
            return $messageContact = '<p style="color:red; font-size: 13px; text-align : center; margin : 1% 0" >Verifier que tous les champs sont bien remplis !</p>';
        }
    }
}
// ------------------------------------------------------------------------------------------------------------------