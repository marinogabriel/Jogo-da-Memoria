<?php
    require_once 'Conexao.php';
    class Jogador
    {
        private $codigo;
        private $nome;
        private $cpf;
        private $telefone;
        private $email;
        private $usuario;
        private $dataNasc;
        private $senha;

        public function getCodigo()
        {
                return $this->codigo;
        }

        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }


        public function getNome()
        {
                return $this->nome;
        }


        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        public function getCpf()
        {
                return $this->cpf;
        }

        public function setCpf($cpf)
        {
                $this->cpf = $cpf;

                return $this;
        }


        public function getTelefone()
        {
                return $this->telefone;
        }

        public function setTelefone($telefone)
        {
                $this->telefone = $telefone;

                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getUsuario()
        {
                return $this->usuario;
        }

        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        public function getDataNasc()
        {
                return $this->dataNasc;
        }

        
        public function setDataNasc($dataNasc)
        {
                $this->dataNasc = $dataNasc;

                return $this;
        }

        public function getSenha()
        {
                return $this->senha;
        }
 
        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }
        

        public function cadastrar()
        {
            $cx = new Conexao();
            $cmdSql = "CALL cadastrarJogador('$this->nome','$this->cpf','$this->telefone','$this->email','$this->usuario','$this->dataNasc','$this->senha');";
            return $cx->insert($cmdSql);
        }

        
        public function consultarPorUsuario($usuario) {
            $cx = new Conexao();
            $cmdSql = "CALL consultarPorUsuario('$usuario')";
            $result = $cx->select($cmdSql);
            if($result){
                $dadosDoBanco = $result [0];
                $this->codigo = $dadosDoBanco['codigo'];
                $this->nome = $dadosDoBanco['nome'];
                $this->cpf = $dadosDoBanco['cpf'];
                $this->telefone = $dadosDoBanco['telefone'];
                $this->email = $dadosDoBanco['email'];
                $this->usuario = $dadosDoBanco['usuario'];
                $this->dataNasc = $dadosDoBanco['dataNasc'];
                $this->senha = $dadosDoBanco['senha'];
                return true;
            }
            return false;
        }

        public function consultarPreHistoricoJogador($usuario) {
                $cx = new Conexao();
                $cmdSql = "CALL consultarPreHistoricoJogador('$usuario')";
                return $result = $cx->select($cmdSql);
        }

        public function consultarHistoricoJogador($usuario){
                $cx = new Conexao();
                $cmdSql = "CALL consultarHistoricoJogador('$usuario')";
                return $result = $cx->select($cmdSql);
        }

        function mysqlPassword($raw) {
                return '*'.strtoupper(hash('sha1',pack('H*',hash('sha1', $raw))));
        }

        public function login($usuario,$senha){
                if($this->consultarPorUsuario($usuario)){
                    return $this->mysqlPassword($senha) == $this->senha;
                }
                return false;
        }
 


       /* public function excluir($id)
        {
            $cx = new Conexao();
            $cmdSql = "CALL produto_excluir($id);";
            return $cx->select($cmdSql);
        }
        public function consultarindiv($id)
        {
            $cx = new Conexao();
            $cmdSql = "CALL produto_consultarindiv($id);";
            return $cx->select($cmdSql);
        }*/

       

    }
?>