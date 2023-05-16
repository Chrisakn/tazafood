<?php ob_start();  ?>

<div class="connexInscripContainer">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Connexion -->
                <form id="form" method="POST" class="sign-in-form">
                    <h2 class="title-reservation">S'identifier</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="login" placeholder="exemple@gmail.com" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input class="password-input" type="password" name="password" placeholder=" Mot de passe" required>
                        <div class="eye-btn"><i class="uil uil-eye-slash"></i>
                        </div>
                    </div>
                    <input type="submit" name="connexion" value="Se connecter" class="btn_connexion" />
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <img src="<?= URL ?>public/sources/undraw_web_developer_re_h7ie.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="<?= URL ?>public/js/connexion.js"></script>
<?php if($alert !== ""){ 
    echo afficherAlert($alert, ALERT_DANGER);
} 
?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

            
      