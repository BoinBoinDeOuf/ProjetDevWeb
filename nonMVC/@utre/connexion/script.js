document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 0;
    const steps = document.querySelectorAll(".step");
    const nextBtns = document.querySelectorAll(".next");
    const prevBtns = document.querySelectorAll(".prev");
    const form = document.getElementById("form-inscription");
    const message = document.getElementById("message");

    function showStep(step) {
        steps.forEach((s, index) => {
            s.classList.toggle("active", index === step);
        });
    }

    nextBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    prevBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(form);
        fetch("register.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            message.textContent = data.message;
            if (data.success) {
                form.reset();
                currentStep = 0;
                showStep(currentStep);
            }
        })
        .catch(error => {
            message.textContent = "Erreur lors de l'inscription.";
        });
    });

    showStep(currentStep);
});
