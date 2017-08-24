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
    public function maiorValor()
    {
        if (count($this.getItens()) === 0) {
            return 0;
        }

        $maiorValor = $this->getProdutos()[0]->getValorUnitario();
        foreach ($this->getProdutos as $produto) {
            if ($produto->getValorUnitario() > $maiorValor) {
                $maiorValor = $produto->getValorUnitario();
            }
        }

        return $maiorValor;
    }
}
