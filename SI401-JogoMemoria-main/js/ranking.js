let btn2x2 = document.getElementById('span2x2');
let btn4x4 = document.getElementById('span4x4');
let btn6x6 = document.getElementById('span6x6');
let btn8x8 = document.getElementById('span8x8');


let xhttp;
function enviarDados(parametro) {
    let dimensao = parametro;
    xhttp = new XMLHttpRequest();
    if (!xhttp) {
        alert('Não foi possível criar um objeto XMLHttpRequest.');
        return false;
    }
    xhttp.onreadystatechange = mostraResposta;
    xhttp.open('POST', './backend/criartabela.php', true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send('minhadimensao=' + encodeURIComponent(dimensao));
}


function mostraResposta() {
    let contador = 1;
    try {
        if (xhttp.readyState === XMLHttpRequest.DONE) {
            if (xhttp.status === 200) {
                let resposta = JSON.parse(xhttp.responseText);
                let tds = document.querySelectorAll('td');
                tds.forEach(element => {
                    element.remove();
                });

                let tbody = document.getElementById('ranking');
                tbody.innerText = '';
                let trTh = tbody.insertRow();
                let th_id = trTh.insertCell();
                let th_nome = trTh.insertCell();
                let th_dimensao = trTh.insertCell();
                let th_tempo = trTh.insertCell();

                th_id.innerText = 'Posição';
                th_nome.innerText = 'Nome';
                th_dimensao.innerText = 'Dimensão';
                th_tempo.innerText = 'Tempo';
                resposta.forEach(element => {

                    

                    let tr = tbody.insertRow();
                    let td_id = tr.insertCell();
                    let td_nome = tr.insertCell();
                    let td_dimensao = tr.insertCell();
                    let td_tempo = tr.insertCell();

                    td_id.innerText = contador;
                    td_nome.innerText = element[2];
                    td_dimensao.innerText = element[0];
                    td_tempo.innerText = element[1];
                    contador++;
                });
            }
            else {
                alert('Um problema ocorreu.');
            }
        }
    }
    catch (e) {
        alert("Não houveram jogadores que jogaram esse modo");
    }
}

