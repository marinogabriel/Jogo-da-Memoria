const myForm = document.querySelector('.formSelecaoModoTempo');
const selectTabuleiro = document.querySelector('.selectdimensao');

const salvarTabuleiro = (event) => {
    event.preventDefault();
    localStorage.setItem('tabuleiro',selectTabuleiro.value);

    window.location = 'modoTempo.php';
}

myForm.addEventListener('submit', salvarTabuleiro);
