<?php 
ob_start(); 
?>
<!-- Section apropos -->
<section id="about_us">
    <div id="img_about">
        <img src="<?= URL ?>public/sources/beautiful-shot-outdoor-cafe-narrow-bystreet-paros-greece.jpg" alt="description du restaurant">
    </div>
    <div id="content">
        <div id="box_apropos">
            <h3>A propos de <span>Nous...</span></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Incidunt ab voluptatibus impedit animi, odit mollitia explicabo commodi ducimus molestiae error.
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Incidunt ab voluptatibus impedit animi, odit mollitia </p>
            <a href="#" id="btn_about">En savoir plus</a>
        </div>
        <div class="icons-container">
            <div class="icons">
                <i class="fas fa-address-card"></i><!-- font awesome -->
                <p>carte d'adresse</p>
            </div>
            <div class="icons">
                <i class="fas fa-award"></i>
                <p>carte de fidelité</p>
            </div>
            <div class="icons">
                <i class="fas fa-crown"></i>
                <p>bon de reduction</p>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>