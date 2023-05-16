<?php 
ob_start(); 
?>
<!-- Section service -->
<div id="container-service">  
<div id="sub-container-service">

    <div class="card-service">
        <img src="<?= URL ?>public/sources/undraw_on_the_way_re_swjt.svg" alt="">
        <div class="name-service">LIVRAISON</div>
        <div class="about-service"><p>La livraison c'est partout à Longwy et aux alentours.<br>Le coup de la livraison est de <span>2€</span> 
        </p></div>
    </div>

    <div class="card-service">
        <img src="<?= URL ?>public/sources/undraw_plain_credit_card_re_c07w.svg" alt="">
        <div class="name-service">Options de paiement <br>disponibles
        </div>
        <div class="about-service"><p> Vous avez la possibilité de payer par carte de crédit, vous pouvez aussi payer par sans contact</p></div>
    </div>

    <div class="card-service">
        <img src="<?= URL ?>public/sources/undraw_online_calendar_re_wk3t.svg" alt="">
        <div class="name-service">Nos horaires <br> D'ouverture</div>
        <div class="about-service"><p>Notre restaurant vous accueille du Lundi au dimanche de <span>11h30 à 14h00 </span>et de <span>17h30 à 22h30</span></p></div>
    </div>

    <div class="card-service">
        <img src="<?= URL ?>public/sources/undraw_taken_re_yn20.svg" alt="">
        <div class="name-service">A EMPORTER</div>
        <div class="about-service"><p>Notre restaurant vous proposer de commander en appelant puis de passer récuper votre plats.</span></p></div>
    </div>

    <div class="card-service">
        <img src="<?= URL ?>public/sources/undraw_broadcast_jhwx.svg" alt="">
        <div class="name-service">WIFI GRATUIT</div>
        <div class="about-service"><p>Notre restaurant me à votre disposition la connexion gratuite au reseau wifi.</span></p></div>
    </div>

    <div class="card-service">
        <img src="<?= URL ?>public/sources/undraw_welcome_cats_thqn.svg" alt="">
        <div class="name-service">ANIMAUX DOMESTIQUES</div>
        <div class="about-service"><p>Notre restaurant autorise les animaux domestiques, donc vos animaux sont les bienvenus .</span></p></div>
    </div>
    
    
    
</div>

</div>
<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>