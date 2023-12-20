<?php
    $tabuleiro = (isset($_POST['tabuleiro'])) ? $_POST['tabuleiro'] : 'tabuleiro vazio';
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : 'usuario vazio';
    $dataJogo = (isset($_POST['dataJogo'])) ? $_POST['dataJogo'] : 'dataJogo vazio';
    $statusVitoria = (isset($_POST['statusVitoria'])) ? $_POST['statusVitoria'] : 'statusVitoria vazio';
    $tempoUsado = (isset($_POST['tempoUsado'])) ? $_POST['tempoUsado'] : NULL;
    $modo = (isset($_POST['modo'])) ? $_POST['modo'] : 'modo vazio';

    require_once '../class/Partida.php';
    $partida = new Partida();
    $partida->setCodigoJogador($usuario);
    $partida->setModo($modo);
    $partida->setDimensao($tabuleiro);
    $partida->setDatajogo($dataJogo);
    $partida->setResultado($statusVitoria);
    $partida->setTempoJogo($tempoUsado);
    $result = $partida->cadastrar();
    if($result){
        echo json_encode('Partida salva no bd!');
    }
?>