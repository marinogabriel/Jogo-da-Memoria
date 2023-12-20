<?php
    session_start();
    include 'login/verificarLogin.php';
?>

<!DOCTYPE html>

<html lang="pt">
    <head>
        <title>BigBrain - Histórico</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/historico.css">
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
                <h1>Histórico de Partidas</h1>
            </div>
          
            <table>
                <tr>
                    <th id="modo">Modo</th>
                    <th id="dimensao">Dimensão</th>
                    <th id="tempo">Tempo</th>
                    <th id="data">Data</th>
                    <th id="status">Resultado</th>
                </tr>
            <?php
                
                require_once 'class/Jogador.php';
                $jogador = new Jogador();
                $listaPartida = $jogador->consultarHistoricoJogador($_SESSION['usuario']);
                if($listaPartida){
                    foreach($listaPartida as $partida)
                    {
                        if($partida['modo'] == '0'){
                            echo "<tr>
                                <td>Clássico</td>
                                <td>".$partida['dimensao']."</td>
                                <td> - </td>
                                <td>".$partida['datajogo']."</td>";
                                if($partida['resultado'] == '1'){
                                    echo "<td>Vitória</td>";
                                }
                                else{
                                    echo "<td>Derrota</td>";
                                }
                               
                              echo "</tr>";
                        }
                        else{
                            echo "<tr>
                            <td>Tempo</td>
                            <td>".$partida['dimensao']."</td>
                            <td>".$partida['tempoJogo']."</td>
                            <td>".$partida['datajogo']."</td>";
                            if($partida['resultado'] == "1"){
                                echo"<td>Vitória</td>";
                            }
                            else{
                                echo"<td>Derrota</td>";
                            }
                           
                          echo "</tr>";
                        }
                                                        
                    }
                }
            ?>
            </table>
        </section>
        <a href="index.php">
            <footer id="voltar">
                    <img src="src/voltar.png" alt="btnvoltar">
                    <h4>Voltar</h4>
            </footer>
        </a> 
    </body>    
</html>