<?php

/**
 * Classe CacheService
 * 
 * Serviço responsável por gerenciar o cache utilizando o CacheSEI.
 * Implementa o padrão Singleton para garantir uma única instância da classe.
 */
class CacheService {
    /**
     * @var CacheService|null Instância única da classe CacheService.
     */
    private static $instance = null;

    /**
     * @var CacheSEI Instância do cache fornecido pelo SEI.
     */
    private $cache;

    /**
     * Construtor privado para garantir o padrão Singleton.
     * Inicializa a instância do CacheSEI.
     */
    private function __construct() {
        var_dump(__DIR__);

        $this->cache = CacheSEI::getInstance();
    }

    /**
     * Obtém a instância única do CacheService.
     *
     * @return CacheService Instância única do serviço de cache.
     */
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new CacheService();
        }
        return self::$instance;
    }

   /**
     * Armazena um valor no cache com um tempo de expiração.
     *
     * @param string $key Chave do atributo no cache. Deve seguir o padrão "MD_<instituição/módulo>".
     * @param mixed $value Valor a ser armazenado (não pode ser nulo).
     * @param int|null $minuteExpire Tempo de expiração do cache em segundos. 
     *        Se for nulo, será utilizado o valor padrão do sistema configurado no CacheSEI.
     * @return bool Retorna true se o valor foi armazenado com sucesso, false caso contrário.
     */
    public function set($key, $value, $minuteExpire = null) {
        $minuteExpire = $minuteExpire ?? CacheSEI::getInstance()->getNumTempo();
        return $this->cache->setAtributo($key, $value, $minuteExpire);
    }

    /**
     * Recupera um valor do cache com base na chave informada.
     *
     * @param string $key Chave do atributo a ser recuperado.
     * @return mixed Retorna o valor armazenado ou null se a chave não existir.
     */
    public function get($key) {
        return $this->cache->getAtributo($key);
    }
}
