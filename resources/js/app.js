import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();


// TEXTO A VOZ ------------------------

let isReading = false; // Verifica si está leyendo
let currentSpeech = null; // Almacena la lectura actual

// Función para activar o desactivar el modo de lectura
window.toggleLectura = function toggleLectura() {
    const textElement = document.getElementById("textToRead");

    if (!textElement) {
        console.error("Elemento con ID 'textToRead' no encontrado.");
        return;
    }

    const textToRead = textElement.innerText.trim();

    if (!textToRead) {
        console.warn("No hay texto disponible para leer.");
        return;
    }

    if (isReading) {
        // Detener cualquier lectura en curso
        window.speechSynthesis.cancel();
        isReading = false;
        document.getElementById("readButton").innerText = "Activar texto a voz";
        console.log("Lectura detenida");
    } else {
        // Iniciar la lectura si no está activa
        if ("speechSynthesis" in window) {
            currentSpeech = new SpeechSynthesisUtterance(textToRead);
            currentSpeech.lang = "es-ES";
            currentSpeech.volume = 1;
            currentSpeech.rate = 1;
            currentSpeech.pitch = 1;

            // Manejar cuando la lectura termina o es cancelada
            currentSpeech.onend = () => {
                console.log("Lectura completada");
                isReading = false;
                document.getElementById("readButton").innerText = "Activar texto a voz";
            };

            currentSpeech.oncancel = () => {
                console.log("Lectura cancelada");
                isReading = false;
                document.getElementById("readButton").innerText = "Activar texto a voz";
            };

            // Comenzar la lectura
            window.speechSynthesis.speak(currentSpeech);
            isReading = true;
            document.getElementById("readButton").innerText = "Desactivar texto a voz";
            console.log("Lectura activada");
        } else {
            alert("Lo siento, la lectura por voz no está soportada en tu navegador.");
        }
    }
};

// Asignar eventos exclusivamente al botón `readButton`
document.addEventListener("DOMContentLoaded", () => {
    const readButton = document.getElementById("readButton");

    if (readButton) {
        // Manejo específico para `Enter` en `readButton`
        readButton.addEventListener("keydown", (event) => {
            if (event.key === "Enter") {
                toggleLectura();
                event.preventDefault(); // Evita conflictos con otros eventos
                event.stopPropagation(); // Detiene la propagación del evento
            }
        });

        // Manejo específico para clic en `readButton`
        readButton.addEventListener("click", (event) => {
            toggleLectura();
            event.preventDefault();
        });
    }
});




// NAVEGACIÓN CON TECLADO ------------------------

let currentIndex = 0; // Índice del elemento actualmente enfocado
const focusableElements = Array.from(document.querySelectorAll("[tabindex]"));

// Actualizar el foco
window.updateFocus = function updateFocus(index) {
    focusableElements.forEach((el, i) => {
        if (i === index) {
            el.classList.add("focused"); // Clase para resaltar el elemento
            el.focus(); // Establece el foco
        } else {
            el.classList.remove("focused"); // Remueve la clase del resto
        }
    });
};

// Manejar eventos de teclado para navegación
document.addEventListener("keydown", (event) => {
    const currentElement = focusableElements[currentIndex];

    if (event.key === "ArrowDown") {
        currentIndex = (currentIndex + 1) % focusableElements.length;
        updateFocus(currentIndex);
        event.preventDefault();
    } else if (event.key === "ArrowUp") {
        currentIndex = (currentIndex - 1 + focusableElements.length) % focusableElements.length;
        updateFocus(currentIndex);
        event.preventDefault();
    } else if (event.key === "Enter") {
        // Asegurarse de que no se active el botón de texto a voz si no tiene el foco
        if (currentElement.id !== "readButton" && (currentElement.tagName === "BUTTON" || currentElement.tagName === "A")) {
            currentElement.click(); // Ejecuta el clic en otros elementos interactivos
        }
        event.preventDefault();
    }
});

// Establece el foco inicial
updateFocus(currentIndex);
