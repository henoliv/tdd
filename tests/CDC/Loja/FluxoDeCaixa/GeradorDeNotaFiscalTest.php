<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\Test\TestCase;
use CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use CDC\Loja\FluxoDeCaixa\Pedido;
use CDC\Exemplos\RelogioDoSistema;

class GeradorDeNotaFiscalTest extends TestCase
{
    public function testDeveGerarNFComValorDeImpostoDescontado()
    {
        $gerador = new GeradorDeNotaFiscal([], new RelogioDoSistema());
        $pedido = new Pedido("Andre", 1000, 1);

        $nf = $gerador->gera($pedido);

        $this->assertEquals(1000*0.94, $nf->getValor(), null, 0.00001);
    }

    /**
     * @covers CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal::gera()
     */
    public function testDeveInvocarAcoesPosteriores()
    {
        $acao1 = \Mockery::mock(
            "CDC\Loja\FluxoDeCaixa\AcaoAposGerarNotaInterface"
        );

        $acao1->shouldReceive("executa")->andReturn(true);

        $acao2 = \Mockery::mock(
            "CDC\Loja\FluxoDeCaixa\AcaoAposGerarNotaInterface"
        );
        $acao2->shouldReceive("executa")->andReturn(true);

        $gerador = new GeradorDeNotaFiscal([$acao1, $acao2], new RelogioDoSistema());
        $pedido = new Pedido("Andre", 1000, 1);

        $nf = $gerador->gera($pedido);

        $this->assertTrue($acao1->executa($nf));
        $this->assertTrue($acao2->executa($nf));
        $this->assertNotNull($nf);
        $this->assertInstanceOf("CDC\Loja\FluxoDeCaixa\NotaFiscal", $nf);
    }

    /**
     * @covers CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal::gera()
     */
    public function testDeveRetornarADataAtual()
    {
        
        $relogio = new RelogioDoSistema();
        $gerador = new GeradorDeNotaFiscal([], $relogio);
        $pedido = new Pedido("Andre", 1000, 1);

        $nf = $gerador->gera($pedido);
        
        $this->assertEquals($relogio->hoje(), $nf->getData());
    }
}
