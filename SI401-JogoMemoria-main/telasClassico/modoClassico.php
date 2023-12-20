<?php
    session_start();
    include '../login/verificarLogin.php';
?>
<!DOCTYPE html>

<html lang="pt">
    <head>
        <title>BigBrain - Modo Clássico</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="stylesheet" type="text/css" href="../css/modoclassico.css">
        <script defer src="../js/modoClassico.js"></script>
    </head>
    <body>
       <nav>
        <img src="../src/brain.png" alt="logo">
        <div class="menu">
            <p id="comp1">Fulano, você está jogando no <br>modo clássico, dimensão 2x2</p>
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
                    </div>
                -->
            </div>
        </section>
        <?php echo "<input type='hidden' id='usuario' value='".$_SESSION['usuario']."'/>";?>
        <div class="info">
            <div class="trapaca">
                <h1>Ativar Trapaca</h1>
            </div>
            <div class="desistir" onclick="redirect()">
                <h1>Desistir</h1>
            </div>
       </div>
       <a href="../index.php">
            <footer id="voltar">
                    <img src="../src/voltar.png" alt="btnvoltar">
                    <h4>Voltar</h4>
            </footer>
        </a>
    </body>
</html>