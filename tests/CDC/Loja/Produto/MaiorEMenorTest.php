<?php

namespace CDC\Loja\Produto;

require "./vendor/autoload.php";

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;
use CDC\Loja\Produto\MaiorEMenor;
use PHPUnit_Framework_TestCase as PHPUnit;

class MaiorEMenorTest extends PHPUnit
{
    
    public function testOrdemDecrescente()
    {
        $carrinho = new CarrinhoDeCompras();

        $carrinho->adiciona(new Produto("Geladeira", 450.00));
        $carrinho->adiciona(new Produto("Liguidificador", 250.00));
        $carrinho->adiciona(new Produto("Jogo de pratos", 70.00));

        $maiorMenor = new MaiorEMEnor();
        
        $maiorMenor->encontra($carrinho);

        $this->assertEquals(
            "Jogo de Pratos",
            $maiorMenor->getMenor()->getNome()
        );

        $this->assertEquals(
            "Geladeira",
            $maiorMenor->getMaior()->getNome()
        );
    }
}
