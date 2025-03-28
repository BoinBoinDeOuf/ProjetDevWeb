document.addEventListener("DOMContentLoaded", () => {
    const checkboxDaltonien = document.getElementById("toggleDaltonien");
    const checkboxDyslexie = document.getElementById("toggleDyslexie");
    const checkboxLangue = document.getElementById("toggleLangue");
    const body = document.body;

    // Textes pour la langue
    const textes = {
        fr: {
            title: "Accessibilité : Daltonisme & Dyslexie",
            labelDaltonien: "Mode Daltonien",
            labelDyslexie: "Mode Dyslexie",
            labelLangue: "Langue : Français",
            content: "Ce texte est un exemple pour tester les modes d'accessibilité."
        },
        en: {
            title: "Accessibility: Color Blindness & Dyslexia",
            labelDaltonien: "Color Blind Mode",
            labelDyslexie: "Dyslexia Mode",
            labelLangue: "Language: English",
            content: "This text is an example to test accessibility modes."
        }
    };

    // Appliquer la langue sélectionnée
    function setLangue(lang) {
        document.getElementById("title").textContent = textes[lang].title;
        document.getElementById("labelDaltonien").textContent = textes[lang].labelDaltonien;
        document.getElementById("labelDyslexie").textContent = textes[lang].labelDyslexie;
        document.getElementById("labelLangue").textContent = textes[lang].labelLangue;
        document.getElementById("content").textContent = textes[lang].content;
        localStorage.setItem("lang", lang);
    }

    // Charger les préférences enregistrées
    if (localStorage.getItem("daltonien") === "true") {
        body.classList.add("daltonien");
        checkboxDaltonien.checked = true;
    }

    if (localStorage.getItem("dyslexie") === "true") {
        body.classList.add("dyslexie");
        checkboxDyslexie.checked = true;
    }

    const savedLang = localStorage.getItem("lang") || "fr";
    setLangue(savedLang);
    checkboxLangue.checked = savedLang === "en";

    // Gestion des événements
    checkboxDaltonien.addEventListener("change", () => {
        body.classList.toggle("daltonien", checkboxDaltonien.checked);
        localStorage.setItem("daltonien", checkboxDaltonien.checked);
    });

    checkboxDyslexie.addEventListener("change", () => {
        body.classList.toggle("dyslexie", checkboxDyslexie.checked);
        localStorage.setItem("dyslexie", checkboxDyslexie.checked);
    });

    checkboxLangue.addEventListener("change", () => {
        setLangue(checkboxLangue.checked ? "en" : "fr");
    });
});
