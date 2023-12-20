<!DOCTYPE html>

<html lang="pt">
    <head>
        <title>BigBrain - Cadastro</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script defer src="js/cadastro.js"></script>
    </head>
    <body>
        <main class = "cadastro">
            <img id="biglogo" src="src/brain.png" alt="BigBrain Logo">
            <h2>BigBrain</h2>
            <p style="margin-top: 0em;">Jogo da Memória</p>
            
            <form id="formCadastro" method="POST" style="display: inline">
                <input type="text" id="nome" name="nome" class="form" required placeholder="Nome completo">
                <input type="text" id="dtNasc" name="dtNasc" class="form"  onfocus="(this.type='date')" required placeholder="Data de nascimento">
                <input type="text" id ="cpf" name ="cpf" pattern="\d{11}" maxlength="11" class="form" required placeholder="CPF:  11 digitos">
                <input type="tel" id="tel" name="tel" class="form" required placeholder="Telefone: (XX) XXXXX-XXXX">
                <input type="email" id="email" name="email" class="form" required placeholder="E-mail: seuemail@dominio.com">
                <input type="text" id="usuario" name="usuario" class="form" required placeholder="Usúario">
                <input type="password" id="senha" name="senha" class="form" required placeholder="Senha">
                <input type="password" id="senha2" class="form" required placeholder="Confirme sua senha">
                <input type="submit" name="btnCadastrar" value="cadastrar" id="btnSubmit" class="botao">
            </form>

            <?php
                if(isset($_POST['btnCadastrar'])){
                    require_once 'class/Jogador.php';
                    $usuario = new Jogador();
                    $usuario->setNome($_POST['nome']);
                    $usuario->setCpf($_POST['cpf']);
                    $usuario->setTelefone($_POST['tel']);
                    $usuario->setEmail($_POST['email']);
                    $usuario->setUsuario($_POST['usuario']);
                    $usuario->setDataNasc($_POST['dtNasc']);
                    $usuario->setSenha($_POST['senha']);

                   
                    if($usuario->cadastrar()){
                        echo '<br>Cadastrado com sucesso !!!';
                    } else {
                        echo '<br>Erro: usúario ou CPF já está cadastrado.';
                    }
                }
            ?>
	    <p>Já possui uma conta? <a href="login.php"> <b>Entre</b></a></p>
        </main>
    </body>    
</html>
