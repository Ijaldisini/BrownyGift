const container = document.getElementById("container");

const registerBtn = document.getElementById("register");

const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
    container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});

function togglePass(inputId, element) {
    const passwordInput = document.getElementById(inputId);
    const eyeOpen = element.querySelector(".eye-open");
    const eyeClosed = element.querySelector(".eye-closed");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeOpen.classList.remove("hidden");
        eyeClosed.classList.add("hidden");
    } else {
        passwordInput.type = "password";
        eyeOpen.classList.add("hidden");
        eyeClosed.classList.remove("hidden");
    }
}
