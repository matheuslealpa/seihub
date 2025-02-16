<?php

class MdSeiHubIntegracao extends SeiIntegracao {

    private const NOME_MODULO = "SeiHub";
    private const VERSAO_MODULO = "0.0.1-SNAPSHOT";
    private const INSTITUICAO_MODULO = "MATHEUS LEAL";

    public function __construct() {}

    public function inicializar($strVersaoSEI) {
        //todo: implementar
    }

    public function getNome() {
        return self::NOME_MODULO;
    }

    public function getVersao() {
        return self::VERSAO_MODULO;
    }

    public function getInstituicao() {
        return self::INSTITUICAO_MODULO;
    }

}
