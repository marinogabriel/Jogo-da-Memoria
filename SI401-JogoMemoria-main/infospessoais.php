<?php
    session_start();
    include 'login/verificarLogin.php';
?>
<!DOCTYPE html>

<html lang="pt">
    <head>
        <title>BigBrain - Informações Pessoais</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <main class = "infos">
            <img id="biglogo" src="src/brain.png" alt="BigBrain Logo">
            <h2>BigBrain</h2>
            <p style="margin-top: 0em;">Jogo da Memória</p>
	        <p>Informações Pessoais</p>
	    <p class="inalteravel">Usuário</p>
	    <p class="inalteravel">CPF</p>
	    <p class="inalteravel">Data de nascimento</p>
            <form>
                <input type="text" class="form" required placeholder="Nome completo">
                <input type="tel" class="form" required placeholder="Telefone: (XX) XXXXX-XXXX">
                <input type="email" class="form" required placeholder="E-mail: seuemail@dominio.com">
                <input type="password" class="form" required placeholder="Senha">
                <input type="password" class="form" required placeholder="Confirmar senha">
                <input type="submit" value="Salvar" class="botao">
            </form>
        </main>
        <a href="index.php">
            <footer id="voltar">
                    <img src="src/voltar.png" alt="btnvoltar">
                    <h4>Voltar</h4>
            </footer>
        </a>
    </body>    
</html>
