/* Js de la reponse -> message d'envoie */
const popupScreen = document.querySelector("#popup-message");
// const popupBox = document.querySelector("#popup-box");
const closeBtn = document.querySelector(".close-btn");

window.addEventListener("load", () => {

    popupScreen.classList.add("active");
});

closeBtn.addEventListener("click", () => {
    popupScreen.classList.remove("active");
});