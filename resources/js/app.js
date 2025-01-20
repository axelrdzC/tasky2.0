import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



// DE TEXTO A VOZ

// listener para el boton de modo voz
// Verifica si el elemento "readButton" existe antes de agregar el listener
const readButton = document.getElementById("readButton");
if (readButton) {
    document.getElementById("readButton").addEventListener("keydown", (event) => {
        if (event.key === "Enter") {
            document.getElementById("readButton").click(); // simulamos el click al hacer enter
        }
    });
}    

let isReading = false; // sigue leyendo?
let currentSpeech = null; // guardar lectura en curso

// funcion que se encarga de leer (activar) o detener
window.toggleLectura = function toggleLectura() {

    const textElement = document.getElementById("textToRead"); // get el texto a leer

    if (!textElement) { // manejamos en caso d q no exista
        console.error("Elemento con ID 'textToRead' no encontrado.");
        return;
    }

    const textToRead = textElement.innerText.trim(); // get texto y eliminar espacios innecesarios

    if (!textToRead) { // por si esta vacie
        console.warn("No hay texto disponible para leer.");
        return;
    }

    if (isReading) {
        // si ya estaba leyendo, detener la lectura
        window.speechSynthesis.cancel();
        document.getElementById("readButton").innerText = "Activar texto a voz";
        console.log("Lectura detenida");
    } else {
        // si no estaba leyendo, empezar la lectura
        
        // verificar disponibilidad d SpeechSynthesis
        if ("speechSynthesis" in window) {
            currentSpeech = new SpeechSynthesisUtterance(textToRead);
            currentSpeech.lang = "es-ES";
            currentSpeech.volume = 1;
            currentSpeech.rate = 1;
            currentSpeech.pitch = 1;

            // reproducir texto y cambiar el label del boton
            window.speechSynthesis.speak(currentSpeech);
            document.getElementById("readButton").innerText = "Desactivar texto a voz";
            console.log("Lectura activada");
        } else {
            alert("Lo siento, la lectura por voz no está soportada en tu navegador.");
            console.error("El navegador no soporta SpeechSynthesis.");
        }
    }

    // actualizar el estado de lectura
    isReading = !isReading;
}

// para q solo lea una vez el elemento al q se le hace hover
let lastHoveredElement = null;
// Escucha global para elementos con la clase "readable"
document.addEventListener("mouseover", (event) => {
    if (event.target && event.target.classList.contains("readable") && event.target !== lastHoveredElement) {
        lastHoveredElement = event.target;
        hoverLeer(event.target); // Llama a la función para leer el texto
    }
});

// funcion para leer elementos en los q se hace hover
window.hoverLeer = function hoverLeer(element) {
    if (isReading) {
        // si esta leyendo, detenemos
        window.speechSynthesis.cancel();

        // obtenemos el texto del elemento a ser leido
        const elementText = element.innerText.trim();

        if (elementText && "speechSynthesis" in window) {
            currentSpeech = new SpeechSynthesisUtterance(elementText);
            currentSpeech.lang = "es-ES";
            currentSpeech.volume = 1;
            currentSpeech.rate = 1;
            currentSpeech.pitch = 1;

            window.speechSynthesis.speak(currentSpeech);
            console.log("Leyendo: " + elementText);
        } else {
            alert("Lo siento, la lectura por voz no está soportada en tu navegador.");
            console.error("El navegador no soporta SpeechSynthesis.");
        }
    }
}


// NAVEGACIÓN CON TECLADO

let currentIndex = 0; // index del elemento actualmente enfocado
const focusableElements = Array.from(document.querySelectorAll("[tabindex]")); // tabindex para obtener todos los elementos

window.updateFocus = function updateFocus(index) {
    focusableElements.forEach((el, i) => {
        if (i === index) {
            el.classList.add("focused");
            el.focus();
        } else {
            el.classList.remove("focused");
        }
    });
}

document.addEventListener("keydown", (event) => {
    if (event.key === "ArrowDown") {
        currentIndex = (currentIndex + 1) % focusableElements.length;
        updateFocus(currentIndex);
    } else if (event.key === "ArrowUp") {
        currentIndex = (currentIndex - 1 + focusableElements.length) % focusableElements.length;
        updateFocus(currentIndex);
    } else if (event.key === "Enter") {
        const currentElement = focusableElements[currentIndex];
        if (currentElement.tagName === "BUTTON" || currentElement.tagName === "A") {
            currentElement.click();
        }
    }
});

updateFocus(currentIndex); // establecemos el foco inicial
