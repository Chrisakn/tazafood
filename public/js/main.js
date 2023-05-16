// js du menu toggle
var small_menu = document.querySelector('.toggle_menu');
var menu = document.querySelector('.menu');
small_menu.onclick = function(){
  small_menu.classList.toggle('active');
  menu.classList.toggle('responsive');
}

// js du header et de son effet shadow
let header = document.querySelector("header");
window.addEventListener("scroll",()=> {
  header.classList.toggle("shadow", window.scrollY > 0);
});

// Le js du carouselle
let img__slider = document.getElementsByClassName('img__slider');// Cette variable va contenire tous mes images (liste de toutes les images) // ça devient un tableau
let etape = 0;// cette variable permet de savoir quelle image afficher
let nbr__img = img__slider.length;// permet de savoir le nombre d'images

// mes variables pour les bouttons gauche et droite
let precedent = document.querySelector('#precedent');
let suivant = document.querySelector('#suivant');

//Cette fonction permet d’enlever la classe active sur toutes les images.
function enleverActiveImages() {
    for(let i = 0 ; i < nbr__img ; i++) {
        img__slider[i].classList.remove('active');
    }
}

// Nos évènements
// Clic sur "suivant" incrémente l’étape, enleve la classe active sur toutes les images sauf sur l’image correspondant à l’étape courante
suivant.addEventListener('click', function() {
    etape++; //incrémentation
    // si l'étape est supérieure ou égale au nombre d'image, alors il faudra remettre l'étape à 0 afin de ne pas essayer d'afficher une image qui n'existe pas
    if(etape >= nbr__img) {
        etape = 0;
    }
    enleverActiveImages(); // On enlève la class active sur toutes les images
    img__slider[etape].classList.add('active'); // Et on la met(class active) juste sur l'image actuellement désigné par l'etape
})
// Clic sur "précédent"  Décrémente l’étape, enleve la classe active sur toutes les images sauf sur l’image correspondant à l’étape courante
precedent.addEventListener('click', function() {
    etape--; //decrémentation
    // Si l'étape est inférieure à 0, alors il faudra remettre l'étape à nbr__im -1 afin de ne pas essayer d'afficher une image qui n'existe pas.
    if(etape < 0) {
        etape = nbr__img - 1;
    }
    enleverActiveImages();
    img__slider[etape].classList.add('active');
})

// exécute une fonction qui affiche l'image suivante toutes les 4 secondes
setInterval(function() {
    etape++;
    if(etape >= nbr__img) {
        etape = 0;
    }
    enleverActiveImages();
    img__slider[etape].classList.add('active');
}, 4000);
