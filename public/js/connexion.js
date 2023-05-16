// Js de la page connexion

const passwordInput = document.querySelector(".password-input");
const eyeBtn = document.querySelector(".eye-btn");
    //quand on clique sur l'icone de l'oeil cela change le type de l'input
    eyeBtn.addEventListener("click", () => {

        if (passwordInput.type === "password") {
            passwordInput.type = "text"; //ici le type = " deviens un type "text" du coup visible
            eyeBtn.innerHTML = "<i class='uil uil-eye'></i>";
        } else {
            passwordInput.type = "password";
            eyeBtn.innerHTML = "<i class='uil uil-eye-slash'></i>";
        }
    });
