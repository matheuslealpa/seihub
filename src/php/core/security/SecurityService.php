<?php

class SecurityService
{
    private static $instance = null;
    private $sessao;

    private function __construct() {
        $this->sessao = SessaoSEI::getInstance(); // Obtem a instancia unica de SessaoSEI
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new SecurityService();
        }
        return self::$instance;
    }

    public function getUserId() {
        return $this->sessao->getNumIdUsuario();
    }

    public function getUserSigla() {
        return $this->sessao->getStrSiglaUsuario();
    }

    public function getUserName(){
        return $this->sessao->getStrNomeUsuario();
    }

    public function getUserOrgaoId(){
        return $this->sessao->getNumIdOrgaoUsuario();
    }

    public function getUserOrgaoSigla(){
        return $this->sessao->getStrSiglaOrgaoUsuario();
    }

    public function getUserUnidadeId(){
        return $this->sessao->getNumIdUnidadeAtual();
    }

    public function getUserUnidadeSigla(){
        return $this->sessao->getStrSiglaUnidadeAtual();
    }

    public function __tostring(){
        return sprintf(
            "Usuário: %s (%s), Órgão: %s, Unidade: %s",
            $this->getUserName(),
            $this->getUserSigla(),
            $this->getUserOrgaoSigla(),
            $this->getUserUnidadeSigla()
        );
    }

}