<?php

namespace CDC\LOJA\PRODUTO;

class Produto
{
    private $nome;
    private $valor;

    /**
     * Instancia um objeto do tipo pdoruto
     *
     * @param string $nome
     * @param float $valor
     */
    public function __construct(string $nome, float $valor)
    {
        $this->nome = $nome;
        $this->valor = $valor;
    }

    /**
     * Retorna o nome do produto
     *
     * @return string
     */
    public function getNome():string
    {
        return $this->nome;
    }

    /**
     * Retorna o valor do produto
     *
     * @return float
     */
    public function getValor():float
    {
        return $this->valor;
    }
}
