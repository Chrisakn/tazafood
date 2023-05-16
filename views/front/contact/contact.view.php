<?php ob_start();  ?>




<p class="pl-5">
    <a href="https://www.facebook.com/nosamisnosanimaux/" target=_blank><img src="public/sources/images/Autres/icones/facebook.png" width="30px" alt="Facebook"/></a>
    Suivez-nous sur facebook et participez à l'aventure de Nos Amis Nos Animaux : 
    <a href="https://www.facebook.com/nosamisnosanimaux/" target=_blank><span class="badge bg-pill bg-primary">Notre facebook</span></a>
</p>

<div class="pl-5">
    <p>
        <img src="<?= URL ?>public/sources/images/Autres/icones/courrier.png" width="30px" alt="courrier"/>
        Par courrier : Hameau de la Souleille - 09420 Clermont, Midi-Pyrenees, France
    </p>
    <p>
        <img src="<?= URL ?>public/sources/images/Autres/icones/mail.png" width="30px" alt="mail"/>
        Par mail : <a href="mailto:associationnosamisnosanimaux@gmail.com">associationnosamisnosanimaux@gmail.com</a>
    </p>
    <p>
        <img src="<?= URL ?>public/sources/images/Autres/icones/tel.png" width="30px" alt="tel"/>
        Par téléphone : 06 10 59 94 71
    </p>
    <p>
        <span class="badge bg-pill bg-danger">Ou</span> par notre <span class="badge bg-pill bg-warning">formulaire</span> de contact :
    </p>
</div>


<?php 
if(isset($_POST['nom']) && !empty($_POST['nom']) && 
isset($_POST['mail']) && !empty($_POST['mail']) &&
isset($_POST['objet']) && !empty($_POST['objet']) &&
isset($_POST['message']) && !empty($_POST['message']) &&
isset($_POST['captcha']) && !empty($_POST['captcha'])
){
    $captcha = (int) $_POST['captcha'];
    if($captcha === 8){
        $nom = htmlentities($_POST['nom']);
        $mail = htmlentities($_POST['mail']);
        $objet = htmlentities($_POST['objet']);
        $message = htmlentities($_POST['message']);
        $destinataire = "associationnosamisnosanimaux@gmail.com";
        mail($destinataire, $objet. " - " . $nom, "Mail : ". $mail. " Message : " . $message);
        echo '<div class="alert alert-success" role="alert">';
            echo 'Message envoyé';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Erreur de Captcha, recommencer';
        echo '</div>';
    }
}
?>

<div class="container py-4">
  <form method="POST" id="contactForm">
    <div class="mb-3">
      <label class="form-label" for="nom">Nom :</label>
      <input class="form-control" id="nom" type="text" placeholder="Nom" required />
    </div>

    <!-- Email address input -->
    <div class="mb-3">
      <label class="form-label" for="mail">Email :</label>
      <input class="form-control" name="mail" id="mail" type="email" placeholder="nom@exemple.com" required />
    </div>

    <div class="mb-3">
      <label for="objet" class="form-label">Objet :</label>
      <select class="form-select col" id="objet" name="objet">
        <option value="question">Question</option>
        <option value="adoption">Adoption</option>
        <option value="donnation">Donation</option>
        <option value="autre">Autre</option>
      </select>
    </div>

    <!-- Message input -->
    <div class="mb-3">
      <label class="form-label" for="message">Message :</label>
      <textarea class="form-control" id="message" name="message" placeholder="Message" style="height: 10rem;" required></textarea>
    </div>

    <div class="mb-3">
      <label for="captcha" class="form-label">Combien font 3+5 :</label>
      <input type="number" name="captcha" id="captcha" class="form-control col" required/>
    </div>

    <!-- Form submit button -->
    <div class="d-grid">
      <button class="btn btn-primary btn-lg" type="submit">Valider</button>
    </div>
  </form>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
