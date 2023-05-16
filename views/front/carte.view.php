<?php 
ob_start(); 
?>
<!-- section carte -->
<section id="carte">
    <h1 class="section_title">MENU</h1>
    <div id="super-container">
    <div class="menu-container">
        <div class="parentCategorie-filter">
            <span class="filter-categorie" data-filter="pizza-tomate">PIZZA (base tomate)</span>
            <span class="filter-categorie" data-filter="pizza-creme">PIZZA (base crème)</span>
            <span class="filter-categorie" data-filter="hamburgers">NOS HAMBURGERS</span>
            <span class="filter-categorie" data-filter="sandwich">NOS SANDWICHS</span>
            <span class="filter-categorie" data-filter="plats">NOS PLATS</span>
            <span class="filter-categorie" data-filter="salades">NOS SALADES</span>
            <span class="filter-categorie" data-filter="menus">NOS MENUS</span>
            <span class="filter-categorie" data-filter="nos-plus">NOS PLUS</span>
            <span class="filter-categorie" data-filter="boissons">NOS BOISSONS</span>
        </div>
        <div class="produit-content">
            <?php
            if ($produits != null) {
                $categories = [
                    1 => "hamburgers",
                    2 => "salades",
                    4 => "sandwich",
                    5 => "plats",
                    6 => "pizza-tomate",
                    7 => "pizza-creme",
                    8 => "menus",
                    9 => "nos-plus",
                    10 => "boissons",
                ];
                foreach ($categories as $id_categorie => $categorie) {
                    echo "<section class=\"produit-box $categorie\">";
                    foreach ($produits as $produit) {
                        if ($produit['ID_categorie'] == $id_categorie) {
                            echo "<h1>$produit[nom_produit]</h1>
                                <p>$produit[description_produit]</p>
                                <span class='price'>$produit[prix_produit] €</span>";
                        }
                    }
                    echo "</section>";
                }
            }
            ?>
        </div>
    </div>
</div>

</section>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="<?= URL ?>public/js/carte.js"></script>
<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>