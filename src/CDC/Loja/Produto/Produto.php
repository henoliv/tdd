<?php

namespace CDC\LOJA\PRODUTO;

class Produto
{
    private $nome;
    private $valorUnitario;
    private $quantidade;

    /**
     * Instancia um objeto do tipo pdoruto
     *
     * @param string $nome
     * @param float $valor
     */
    public function __construct(string $nome, float $valorUnitario, int $quantidade = 1)
    {
        $this->nome = $nome;
        $this->valorUnitario = $valorUnitario;
        $this->quantidade = $quantidade;
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
     * Retorna o valor unitário do produto
     *
     * @return float
     */
    public function getValorUnitario():float
    {
        return $this->valorUnitario;
    }

    /**
     * Retorna o valor do produto
     *
     * @return int
     */
    public function getQuantidade():int
    {
        return $this->quantidade;
    }

    /**
     * Retorna o valor final
     *
     * @return float
     */
    public function getValorTotal():float
    {
        return $this->valorUnitario*$this->quantidade;
    }
}
