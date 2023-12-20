<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="pt">

<head>
    <title>BigBrain - Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>


    <main class="login">
        <img id="biglogo" src="src/brain.png" alt="BigBrain Logo">
        <h2>BigBrain</h2>
        <p style="margin-top: 0em;">Jogo da Memória</p>

        <form style="display: inline" action="login/login.php" method="post">
            <input type="text" class="form" name="txtUsuario" required placeholder="Usuario">
            <input type="password" class="form" name="txtSenha" required placeholder="Senha">
            <button class="botao">Entrar</button>
        </form>
        <?php
            if (isset($_SESSION['naoautenticado'])):
        ?>
        <script>
            alert("Usuário ou senha incorreto!");
        </script>
        <?php
            endif;
            unset($_SESSION['naoautenticado']);
        ?>


        <p>Não possui uma conta? <a href="cadastro.php"> <b>Cadastre-se</b></a></p>
    </main>
</body>

</html>