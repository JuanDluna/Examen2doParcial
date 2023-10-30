const startBtn = document.querySelector('.btn-Iniciar');
const popInfo = document.querySelector('.pop-info');
const btnAtras = document.querySelector('.btn-atras');
const continuarBtn = document.querySelector('.continuar-btn');
const quiz = document.querySelector('.quiz-section');

startBtn.onclick = () => {
    popInfo.classList.add('active');
}
btnAtras.onclick = () => {
    popInfo.classList.remove('active');
}
continuarBtn.onclick = () => {
    quiz.classList.add('active');
    popInfo.classList.remove('active');
    //falta quitarle el active a la parte main que pondre cuando el codigo ya se integre
}