<?php
    require_once 'Conexao.php';
    class Partida
    {
        private $codigo;
        private $codigoJogador;
        private $modo;
        private $dimensao;
        private $datajogo;
        private $resultado;
        private $tempoJogo;


        public function getCodigo()
        {
                return $this->codigo;
        }

        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }

        public function getCodigoJogador()
        {
                return $this->codigoJogador;
        }

        public function setCodigoJogador($codigoJogador)
        {
                $this->codigoJogador = $codigoJogador;

                return $this;
        }

        public function getModo()
        {
                return $this->modo;
        }

        public function setModo($modo)
        {
                $this->modo = $modo;

                return $this;
        }

        public function getDimensao()
        {
                return $this->dimensao;
        }

        public function setDimensao($dimensao)
        {
                $this->dimensao = $dimensao;

                return $this;
        }

        public function getDatajogo()
        {
                return $this->datajogo;
        }

        public function setDatajogo($datajogo)
        {
                $this->datajogo = $datajogo;

                return $this;
        }

        public function getResultado()
        {
                return $this->resultado;
        }

        public function setResultado($resultado)
        {
                $this->resultado = $resultado;

                return $this;
        }

        public function getTempoJogo()
        {
                return $this->tempoJogo;
        }

        public function setTempoJogo($tempoJogo)
        {
                $this->tempoJogo = $tempoJogo;
                return $this;
        }

        public function listarRanking($parametro){
                $cx = new Conexao();
                $cmdSql = "CALL listarRanking('$parametro')";
                return $result = $cx->select($cmdSql);
        }

        public function cadastrar()
        {
            $cx = new Conexao();
            $cmdSql = "CALL cadastrarPartida($this->codigoJogador,$this->modo,'$this->dimensao','$this->datajogo',$this->resultado,'$this->tempoJogo');";
            return $cx->insert($cmdSql);
        }
        
        public function listarTodasPartidas(){
                $cx = new Conexao();
                $cmdSql = "CALL listarTodasPartidas()";
                return $result = $cx->select($cmdSql);
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