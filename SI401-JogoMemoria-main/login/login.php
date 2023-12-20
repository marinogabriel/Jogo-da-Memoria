<?php
    require_once("../class/Jogador.php");
    session_start();

    $txtUsuario = $_POST['txtUsuario'];
    $senha = $_POST['txtSenha'];
    $usuario = new Jogador();

    if($usuario->login($txtUsuario,$senha)){
        $_SESSION['usuario'] = $usuario->getCodigo();
        header('Location: ../index.php');
    } else {

        header('Location: ../login.php');
        $_SESSION['naoautenticado'] = true;
    }
?>
