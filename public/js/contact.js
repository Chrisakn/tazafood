const inputs = document.querySelectorAll(".input-enfant");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

/* js de la reponse -> message d'envoie */
const popupScreen = document.querySelector("#popup-message");
const popupBox = document.querySelector("#popup-box");
const closeBtn = document.querySelector(".close-btn");

window.addEventListener("load", () => {
  
    popupScreen.classList.add("active");
    });

closeBtn.addEventListener("click", () => {
      popupScreen.classList.remove("active"); 
});

