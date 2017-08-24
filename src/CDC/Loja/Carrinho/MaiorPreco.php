<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Carrinho\CarrinhoDeCompras;

class MaiorPreco
{
    public function encontra(CarrinhoDeCompras $carrinho)
    {
        if (count($carrinho->getProdutos()) === 0) {
            return 0;
        }
        
        $maiorValor = $carrinho->getProdutos()[0]->getValorTotal();
        
        foreach ($carrinho->getProdutos() as $produto) {
            $maiorValor = $produto->getValorTotal() > $maiorValor
                ? $produto->getValorTotal()
                : $maiorValor;
        }
        
        return $maiorValor;
    }
}
