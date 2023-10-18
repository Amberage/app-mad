let currentQuestion = 0;
const questions = document.querySelectorAll('.question');
const btnPrev = document.getElementById('btn-prev');
const btnNext = document.getElementById('btn-next');
const btnSubmit = document.getElementById('btn-submit');

function nextQuestion() {
  const selectedAnswer = document.querySelector(`#q${currentQuestion + 1}`).value;

  if (selectedAnswer) {
    questions[currentQuestion].style.display = 'none';
    currentQuestion++;

    if (currentQuestion < questions.length) {
      questions[currentQuestion].style.display = 'block';
    }

    if (currentQuestion > 0) {
      btnPrev.style.display = 'block';
    }

    if (currentQuestion === questions.length - 1) {
      btnNext.style.display = 'none';
      btnSubmit.style.display = 'block';
    }
    errorRespuestas.innerHTML = "";
  } else {
    errorRespuestas.innerHTML = "Por favor, selecciona una respuesta antes de continuar.";
  }
}

function prevQuestion() {
  if (currentQuestion > 0) {
    questions[currentQuestion].style.display = 'none';
    currentQuestion--;

    questions[currentQuestion].style.display = 'block';

    if (currentQuestion === 0) {
      btnPrev.style.display = 'none';
    }

    if (currentQuestion < questions.length - 1) {
      btnNext.style.display = 'block';
      btnSubmit.style.display = 'none';
    }
    errorRespuestas.innerHTML = "";
  }
}
