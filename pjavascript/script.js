const questionContaine = document.getElementById('question-container');
const nexBtn = document.getElementById('next-btn');

// Fonction pour charger la prochaine question
function loadNextQuestion() {
    // Utilisez AJAX pour charger la prochaine question depuis le serveur
    // Mettez à jour le contenu de questionContainer avec la nouvelle question
}

// Événement de clic sur le bouton Suivant
nextBtn.addEventListener('click', loadNextQuestion);

// Chargez la première question au chargement de la page
window.onload = loadNextQuestion;
const questionContainer = document.getElementById('question-container');
const nextBtn = document.getElementById('next-btn');
const resultContainer = document.getElementById('result-container');
const timerDisplay = document.getElementById('timer');
let currentQuestionIndex = 0;
let score = 0;
let timeLeft = 30; // Temps en secondes

// Fonction pour démarrer la minuterie
function startTimer() {
    const timer = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(timer);
            checkAnswer(); // Vérifie automatiquement la réponse lorsque le temps est écoulé
        } else {
            timerDisplay.textContent = `Temps restant : ${timeLeft} secondes`;
            timeLeft--;
        }
    }, 1000);
}

// Fonction pour charger une question
function loadQuestion() {
    startTimer(); // Démarrer la minuterie à chaque nouvelle question
    // Le reste du code pour charger la question reste inchangé...
}

// Fonction pour vérifier la réponse et passer à la question suivante
function checkAnswer() {
    // Le reste du code pour vérifier la réponse reste inchangé...
}