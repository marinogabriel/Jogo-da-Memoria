<?php
    session_start();
    include '../login/verificarLogin.php';
?>
<!DOCTYPE html>

<html lang="pt">
    <head>
        <title>BigBrain - Modo Tempo</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="stylesheet" type="text/css" href="../css/modotempo.css">
        <script defer src="../js/jquery-3.6.1.min.js"></script>
        <script defer src="../js/modoTempo.js"></script>
    </head>
    <body>
       <nav>
        <img src="../src/brain.png" alt="logo">
        <div class="menu">
            <p id="comp1">Fulano, você está no modo<br>contra o tempo, dimensão 2x2</p>
            <h1 id="comp2">Jogo da Memória</h1>
            <a href="../index.php" id="comp3">Página Inicial</a>
            <a href="../infospessoais.php" id="comp4">Informações Pessoais</a>
            <a href="../login/logout.php" id="comp5">Sair</a>
        </div>
       </nav>
        <section>
            <div class="grid">
                <!--
                    <div class="card">
                        <div class="face front">
                        </div>
                        
                        <div class="face back">
                        </div>
                    </div>;
                -->
            </div>
        </section>
       <div class="info">
            <div class="timer">
                <img src="../src/timer.png" alt="">
                <p id="timerP">00:00</p>
            </div>
            <div class="trapaca">
                <h1>Ativar Trapaca</h1>
            </div>
            <div class="desistir" onclick="redirect()">
                <h1>Desistir</h1>
            </div>
       </div>
       <?php echo "<input type='hidden' id='usuario' value='".$_SESSION['usuario']."'/>";?>
       <a href="../index.php">
            <footer id="voltar">
                <img src="../src/voltar.png" alt="btnvoltar">
                <h4>Voltar</h4>
            </footer>
        </a>       
    </body>
</html>