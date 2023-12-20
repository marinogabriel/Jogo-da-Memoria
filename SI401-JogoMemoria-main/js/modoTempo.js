const grid = document.querySelector('.grid');
const tabuleiro = localStorage.getItem('tabuleiro');
const timer = document.getElementById('timerP');
let statusVitoria = false;
var today = new Date();
var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
var seconds = today.getSeconds() <= 9 ? '0' + today.getSeconds() : today.getSeconds();
var time = today.getHours() + ':' + today.getMinutes() + ':' + seconds;
localStorage.setItem('dataJogo', date + ' ' + time);
localStorage.removeItem('tempoUsado');
localStorage.removeItem('statusVitoria');


let xhttp;

function enviarDados() {
    let tabuleiro = localStorage.getItem('tabuleiro');
    let usuario = document.getElementById('usuario').value;
    let dataJogo = localStorage.getItem('dataJogo');
    let statusVitoria = localStorage.getItem('statusVitoria');
    let tempoUsado = localStorage.getItem('tempoUsado');
    xhttp = new XMLHttpRequest();
    if (!xhttp) {
        alert('Não foi possível criar um objeto XMLHttpRequest.');
        return false;
    }
    
    xhttp.onreadystatechange = mostraResposta;
    xhttp.open('POST', '../backend/cadastroPartida.php', true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send('tabuleiro=' + encodeURIComponent(tabuleiro)+'&usuario='+encodeURIComponent(usuario)+'&dataJogo=' + encodeURIComponent(dataJogo)+'&statusVitoria=' + encodeURIComponent(statusVitoria)
    +'&tempoUsado=' + encodeURIComponent(tempoUsado)+'&modo='+1);
}

function mostraResposta() {
    try {
        if (xhttp.readyState === XMLHttpRequest.DONE) {
            if (xhttp.status === 200) {
                let resposta = JSON.parse(xhttp.responseText);
                alert("Cadastrado no BD");
            }
            else {
                alert('Um problema ocorreu.');
            }
        }
    }
    catch (e) {
        alert("Ocorreu uma exceção: " + e.description);
    }
}

const redirect = () => {
    localStorage.setItem('statusVitoria',0);
    localStorage.setItem('tempoUsado','00:00:00');
    enviarDados();
    window.location = '../index.php';
    localStorage.setItem('statusVitoria', 0);
}



//definindo o tempo para os jogos dependendo do tamanho do tabuleiro
const i = parseInt(tabuleiro[0]);
grid.style.gridTemplateColumns = `repeat(${i}, 1fr)`;
let minutosIniciais = 0;
if (i == 2) {
    minutosIniciais = 0.08;
} else if (i == 4) {
    minutosIniciais = 1;
} else if (i == 6) {
    minutosIniciais = 2;
} else {
    minutosIniciais = 3;
}
var tempo = minutosIniciais * 60;
let fimTempo = false;
var tempoAtual;

//função para atualizar o cronômetro
const atualizarTempo = () => {
    if (!statusVitoria) {
        const minutes = Math.floor(tempo / 60);
        let segundos = Math.ceil(tempo % 60);

        if (segundos < 10) {
            segundos = '0' + segundos;
        }
        else {
            segundos = segundos;
        }
        if (tempo > 0) {
            timer.innerHTML = `${minutes}:${segundos}`;
            tempoAtual = minutes * 60 + parseInt(segundos);
            tempo--;
        }
        else if (fimTempo == false && statusVitoria != true) {
            fimTempo = true;
            timer.innerHTML = `00:00`;
            setTimeout(() => {
                alert('Você perdeu!');
                clearInterval(atualizarTempo());
                localStorage.setItem('statusVitoria', 0);
                localStorage.setItem('tempoUsado','00:00:00');
                enviarDados();

            }, 200);
            const card = document.querySelectorAll('.card');
            card.forEach(carta => {
                carta.style.cursor = 'not-allowed';
                carta.removeEventListener('click', flipCard);

            });
        }
    }
}

//definindo o nome das imgens das cartas, que também serão o id das classes face front
const cartas = [
    'cartaFront1', 'cartaFront2',
    'cartaFront3', 'cartaFront4',
    'cartaFront5', 'cartaFront6',
    'cartaFront7', 'cartaFront8',
    'cartaFront9', 'cartaFront10',
    'cartaFront11', 'cartaFront12',
    'cartaFront13', 'cartaFront14',
    'cartaFront15', 'cartaFront16',
    'cartaFront17', 'cartaFront18',
    'cartaFront19', 'cartaFront20',
    'cartaFront21', 'cartaFront22',
    'cartaFront23', 'cartaFront24',
    'cartaFront25', 'cartaFront26',
    'cartaFront27', 'cartaFront28',
    'cartaFront29', 'cartaFront30',
    'cartaFront31', 'cartaFront32'
];

//função para criação de elementos html em javascript
const createElement = (tag, className) => {
    const element = document.createElement(tag);
    element.className = className;
    return element;
}

let vezcarta1 = '';
let vezcarta2 = '';

//verificar se as cartas são iguais
const checkMatch = (carta1, carta2) => {
    if (carta1.childNodes != undefined && carta2.childNodes != undefined) {
        const valueCarta1 = carta1.childNodes[0].id;
        const valueCarta2 = carta2.childNodes[0].id;

        if (valueCarta1 == valueCarta2) {
            vezcarta1 = '';
            vezcarta2 = '';
            carta1.firstChild.classList.add('card-match');
            carta2.firstChild.classList.add('card-match');
            const todasDiv = document.querySelectorAll('.card-match');
            if (todasDiv.length == i * i) {
                alert('Parabéns, você ganhou!');
                statusVitoria = true;
                localStorage.setItem('statusVitoria', 1);
                let tempoUsado = minutosIniciais * 60 - tempoAtual;
                tempoUsado = tempoUsado <= 0 ? tempoUsado = 0 : tempoUsado = tempoUsado;
                let minutes2 = Math.floor(tempoUsado / 60);
                let segundos2 = Math.ceil(tempoUsado % 60);
                segundos2 = segundos2 < 10 ? segundos2 = '0' + segundos2 : segundos2 = segundos2;
                minutes2 = minutes2 < 10 ? minutes2 = '0' + minutes2 : minutes2 = minutes2;
                localStorage.setItem('tempoUsado', `00:${minutes2}:${segundos2}`);
                enviarDados();
                clearInterval(atualizarTempo());
            }
        }
        else {
            setTimeout(() => {
                carta1.classList.remove('card-flip');
                carta2.classList.remove('card-flip');
                vezcarta1 = '';
                vezcarta2 = '';
            }, 500);
        }
    }
    else {
        return;
    }
}

//girar a carta
const flipCard = ({ target }) => {
    console.log('click');
    if (target.parentNode.className.includes('card-flip')) {
        return;
    }
    if (vezcarta1 == '') {
        target.parentNode.classList.add('card-flip');
        vezcarta1 = target.parentNode;

    } else if (vezcarta2 == '') {
        target.parentNode.classList.add('card-flip');
        vezcarta2 = target.parentNode;
    }
    checkMatch(vezcarta1, vezcarta2);
}

//função responsável por criar as cartas no formato correto, sendo a card a classe pai e a face front e face back as filhas
const createCard = (imagem) => {
    const card = createElement('div', 'card');
    const front = createElement('div', 'face front');
    const back = createElement('div', 'face back');

    front.id = `${imagem}`;
    front.style.backgroundImage = `url('../src/${imagem}.png')`
    card.appendChild(front);
    card.appendChild(back);


    card.addEventListener('click', flipCard);
    return card;
}

//carrega o jogo ao abrir a tela do modo tempo
const loadGame = () => {

    //sorteia numeros (índices) entre 0 e 31 até a metade do total de cartas do tabuleiro
    const nums = new Set();
    while (nums.size !== (i * i / 2)) {
        nums.add(Math.floor(Math.random() * 32));
    }

    //carrega uma array resgatando as cartas nas posições sorteadas
    const cartasSorteadas = [];
    nums.forEach(numSortido => {
        cartasSorteadas.push(cartas[numSortido]);
    });

    //duplica para poder embaralhar
    const cartasDuplicadas = [...cartasSorteadas, ...cartasSorteadas];

    const cartasEmbaralhadas = cartasDuplicadas.sort(() => Math.random() - 0.5);

    //cria as cartas no html
    cartasEmbaralhadas.forEach(carta => {
        const card = createCard(carta);
        grid.appendChild(card);
    });

    //esconde a parte de trás das cartas para dar um tempo do jogador tentar memorizar e começar o jogo
    const card = document.querySelectorAll('.card');
    card.forEach(carta => {
        carta.style.cursor = 'not-allowed';
        carta.removeEventListener('click', flipCard);

    });
    const faceBack = document.querySelectorAll('.back');
    faceBack.forEach(key => {
        key.style.visibility = `hidden`;
    })
}

//função para fazer as chamadas de funções do javascript parar por determinado tempo
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

//baseado no tamanho do tabuleiro, faz a parte de trás das cartas voltarem a aparecer e assim começar o jogo de fato
async function demo() {
    setInterval(atualizarTempo, 1000);
    const faceBack = document.querySelectorAll('.back');
    const card = document.querySelectorAll('.card');
    for (let j = 0; j < i; j++) {
        await sleep(400);
    }
    faceBack.forEach(element => {
        element.style.visibility = `visible`;
    });
    card.forEach(carta => {
        carta.style.cursor = 'pointer';
        carta.addEventListener('click', flipCard);
    });
}

let trapaca = false;
const btnTrapaca = document.querySelector('.trapaca');
const ativarTrapaca = () => {
    const faceBack = document.querySelectorAll('.back');
    if (trapaca) {
        faceBack.forEach(element => {
            element.style.opacity = `1`;
        });
        trapaca = false;
    }
    else {
        faceBack.forEach(element => {
            element.style.opacity = `0.15`;
        });
        trapaca = true;
    }
}
btnTrapaca.addEventListener('click', ativarTrapaca);

//chamada de funções para iniciar o jogo
loadGame();
demo();
