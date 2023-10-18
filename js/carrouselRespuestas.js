let currentQuestion = 0;
const questions = document.querySelectorAll('.question');
const btnPrev = document.getElementById('btn-prev');
const btnNext = document.getElementById('btn-next');

function nextQuestion() {
  questions[currentQuestion].style.display = 'none';
  currentQuestion = (currentQuestion + 1) % questions.length;
  questions[currentQuestion].style.display = 'block';

  if (currentQuestion === 0) {
    btnPrev.style.display = 'none';
  } else {
    btnPrev.style.display = 'block';
  }

  if (currentQuestion === questions.length - 1) {
    btnNext.style.display = 'none';
  } else {
    btnNext.style.display = 'block';
  }

  errorRespuestas.innerHTML = "";
}

function prevQuestion() {
  questions[currentQuestion].style.display = 'none';
  currentQuestion = (currentQuestion - 1 + questions.length) % questions.length;
  questions[currentQuestion].style.display = 'block';

  if (currentQuestion === 0) {
    btnPrev.style.display = 'none';
  } else {
    btnPrev.style.display = 'block';
  }

  if (currentQuestion === questions.length - 1) {
    btnNext.style.display = 'none';
  } else {
    btnNext.style.display = 'block';
  }

  errorRespuestas.innerHTML = "";
}
