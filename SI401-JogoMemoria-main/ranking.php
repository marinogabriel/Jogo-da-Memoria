<?php
    session_start();
    include 'login/verificarLogin.php';
?>
<!DOCTYPE html>

<html lang="pt">
    <head>
        <title>BigBrain - Ranking</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/ranking.css">
        <script defer src="js/ranking.js"></script>
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
            <div class="logo">
                <img src="src/ranking.png" alt="ranking">
            </div>
            <div class="filter">
                <span id="span2x2" onclick="enviarDados('2x2')">2 x 2</span>
                <span id="span4x4" onclick="enviarDados('4x4')">4 x 4</span>
                <span id="span6x6" onclick="enviarDados('6x6')">6 x 6</span>
                <span id="span8x8" onclick="enviarDados('8x8')">8 x 8</span>
            </div>
            <div id="content">
                <table id="ranking">
                    <tr>
                        <th class="posicao">Posição</th>
                        <th class="nome">Nome</th>
                        <th class="modo">Dimensão</th>
                        <th class="tempo">Tempo</th>
                    </tr>
                    <?php 
                        require_once 'class/Partida.php';
                        $partida = new Partida();
                        $listaPartida = $partida->listarTodasPartidas();
                        $contador = 0;
                        if($listaPartida){
                            foreach($listaPartida as $partida)
                            {
                                $contador++;                            
                                echo "<tr>
                                        <td class='td posicao'>".$contador."</td>
                                        <td class='td nome'>".$partida['nome']."</td>
                                        <td class='td modo'>".$partida['dimensao']."</td>
                                        <td class='td tempo'>".$partida['tempoJogo']."</td> 
                                     </tr>";
                            }
                        }
                    ?>
                </table>
            </div>
       </section>
       <a href="../SI401-JogoMemoria-main/index.php">
            <footer id="voltar">
                    <img src="src/voltar.png" alt="btnvoltar">
                    <h4>Voltar</h4>
            </footer>
        </a>       
    </body>    
</html>