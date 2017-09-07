<?php

namespace CDC\Loja\Carrinho;

use CDC\Loja\Test\TestCase;
use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;

class MaiorPrecoTest extends TestCase
{
    private $carrinho;

    protected function setUp()
    {
        $this->carrinho = new CarrinhoDeCompras();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $valor = $this->carrinho->encontra();

        $this->assertEquals(0, $valor, null, 0.0001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoCom1Elemento()
    {
        $this->carrinho->adiciona(new Produto("Geladeira", 900.00, 1));

        $valor = $this->carrinho->encontra();

        $this->assertEquals(900.00, $valor, null, 0.0001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoComMuitosElementos()
    {
        $this->carrinho->adiciona(new Produto("Geladeira", 900.00, 1));
        $this->carrinho->adiciona(new Produto("Fogão", 1500.00, 1));
        $this->carrinho->adiciona(new Produto("Máquina de lavar", 750.00, 1));

        $valor = $this->carrinho->encontra();

        $this->assertEquals(1500.00, $valor, null, 0.0001);
    }

    
    /**
     * Testa a adição de produtos ao carrinho
     * Este tipo de teste deve verificar a quantidade de produtos
     * antes e depois da operação
     *
     * @return void
     */
    public function testDeveAdicionarItens()
    {
        # Garante que o carrinho está vazio
        $this->assertEmpty($this->carrinho->getProdutos());

        $produto = new Produto("Geladeira", 900.00, 1);
        $this->carrinho->adiciona($produto);

        $esperado = count($this->carrinho->getProdutos());

        $this->assertEquals(1, $esperado);
        $this->assertEquals($produto, $this->carrinho->getProdutos()[0]);
    }
    /**
     * Testa o conteúdo de uma lista
     * Este tipo de teste deve verificar a quantidade de produtos e seus valores
     *
     * @return void
     */
    public function testListaDeProdutos()
    {
        $lista = (new CarrinhoDeCompras())
            ->adiciona(new Produto('Jogo de Jantar', 200.00, 1))
            ->adiciona(new Produto('Jogo de Pratos', 100.00, 1));

        $this->assertEquals(2, count($lista->getProdutos()));

        # Testando apenas com o preço para simplificar, o conceito é testar tudo
        $this->assertEquals(200.0, $lista->getProdutos()[0]->getValorUnitario());
        $this->assertEquals(100.0, $lista->getProdutos()[1]->getValorUnitario());
    }
}
