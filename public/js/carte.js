// JS carteMenu

$(document).ready(function(){
    $(".filter-categorie").click(function(){
        const value = $(this).attr("data-filter")
            $(".produit-box").not("." + value).hide('1000')
            $(".produit-box").filter("." + value).show('1000')
        
    });
    // Activation de l'effet sur les bouttons
    $(".filter-categorie").click(function(){
        $(this).addClass("active-filter").siblings().removeClass("active-filter");
    });
  });
  