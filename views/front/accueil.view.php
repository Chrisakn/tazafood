<?php 
ob_start(); 
?>
<!-- section accueil  -->
<!-- l'id "slider" va nous permettre d'empiler nos images les unes sur les autres -->
<div id="slider">

    <section id="home">
        <div id="left">
            <h1>TAZA FOOD</h1>
            <h2>Nos menus et plats</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa sequi eveniet sed quidem reprehenderit libero officiis.</p>
            <button><a href="index.php?page=maCarte">Voir notre carte</a></button>
        </div>
    </section>

    <!-- voilà l'empilement de nos images les unes sur les autres -->
    <img src="<?= URL ?>public/sources/french-restaurant-scene-paris-france-sidewalk-cafe.jpg" alt="img1" class="img__slider active" />
    <img src="<?= URL ?>public/sources/cafe-g2a6903f25_1920.jpg" alt="img2" class="img__slider" />
    <img src="<?= URL ?>public/sources/restaurant-g922f549e6_1920.jpg" alt="img3" class="img__slider" />
    <img src="<?= URL ?>public/sources/restaurant-tables.jpg" alt="" class="img__slider">
    <!-- l'icon droit qui represente un boutton, qui va nous permettre de passer d'une image à l'autre  -->
    <div id="suivant">
        <i class="fas fa-chevron-circle-right"></i>
    </div>
    <!-- l'icon droit qui represente un boutton, qui va nous permettre de revenir d'une image à l'autre  -->
    <div id="precedent">
        <i class="fas fa-chevron-circle-left"></i>
    </div>

</div>
<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
<!-- fin -->