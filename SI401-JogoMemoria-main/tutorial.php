<?php
    session_start();
    include 'login/verificarLogin.php';
?>
<!DOCTYPE html>

<html lang="pt">
    <head>
        <title>BigBrain - Tutorial</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/ranking.css">
    </head>
    <body>
       <nav>
        <img src="src/brain.png" alt="logo">
        <div class="menu">
            <p id="comp1">Bem-Vindo, Fulano!</p>
            <h1 id="comp2">Jogo da Memória</h1>
            <a href="index.php" id="comp3">Página Inicial</a>
            <a href="infospessoais.php" id="comp4">Informações Pessoais</a>
            <a href="login.php" id="comp5">Sair</a>
        </div>
       </nav>
       <section>
            <iframe src="https://www.youtube.com/watch?v=K_mo6BuF2H0" title="Aula 44 - Brincadeiras para fazer em casa: Jogo da memória"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
       </section>
       <a href="index.php">
            <footer id="voltar">
                    <img src="src/voltar.png" alt="btnvoltar">
                    <h4>Voltar</h4>
            </footer>
        </a>       
    </body>    
</html>
