<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Produto\Produto;
use ArrayObject;

class CarrinhoDeCompras
{
    private $produtos;

    /**
     * Instancia um carrinho de compras
     */
    public function __construct()
    {
        $this->produtos = new ArrayObject();
    }

    /**
     * Adiciona um produto ao carrinho
     *
     * @param Produto $produto
     * @return CarrinhoDeCompras
     */
    public function adiciona(Produto $produto)
    {
        $this->produtos->append($produto);
        return $this;
    }

    /**
     * Retorna os produtos atualmente no carrinho de compras
     *
     * @return ArrayObject
     */
    public function getProdutos()
    {
        return $this->produtos;
    }

    /**
     * Retorna o maior valor dentre os produtos no carrinho de compras
     *
     * @return float
     */
    public function encontra()
    {
        if (count($this->getProdutos()) === 0) {
            return 0;
        }
        
        $maiorValor = $this->getProdutos()[0]->getValorTotal();
        
        foreach ($this->getProdutos() as $produto) {
            $maiorValor = $produto->getValorTotal() > $maiorValor
                ? $produto->getValorTotal()
                : $maiorValor;
        }
        
        return $maiorValor;
    }
}
