<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\Test\TestCase;
use CDC\Loja\FluxoDeCaixa\ProcessadorDeBoletos;
use CDC\Loja\FluxoDeCaixa\Fatura;
use ArrayObject;

class ProcessadorDeBoletosTest extends TestCase
{
    public function testDeveprocessarPagamentoViaBoletoUnico()
    {
        $processador = new ProcessadorDeBoletos();

        $fatura = new fatura('Cliente', 150.0);
        $boleto = new Boleto(150.0);

        $boletos = new ArrayObject();

        $boletos->append($boleto);

        $processador->processa($boletos, $fatura);

        $this->assertEquals(1, count($fatura->getPagamentos()));
        $this->assertEquals(
            150.0,
            $fatura->getPagamentos()[0]->getValor(),
            null,
            0.00001
        );
    }

    public function testDeveProcessarPagamentoViaMuitosBoletos()
    {
        $processador = new ProcessadorDeBoletos();

        $fatura = new fatura('Cliente', 300.0);
        $boleto = new Boleto(100.0);
        $boleto2 = new Boleto(200.0);

        $boletos = new ArrayObject();
        $boletos->append($boleto);
        $boletos->append($boleto2);

        $processador->processa($boletos, $fatura);

        $this->assertEquals(2, count($fatura->getPagamentos()));
        $this->assertEquals(
            100.0,
            $fatura->getPagamentos()[0]->getValor(),
            null,
            0.00001
        );
        $this->assertEquals(
            200.0,
            $fatura->getPagamentos()[1]->getValor(),
            null,
            0.00001
        );
    }

    
    public function testDeveMarcarFaturaComoPagaCasoBoletoUnicoPagueTudo()
    {
        $processador = new ProcessadorDeBoletos();
        
        $fatura = new fatura('Cliente', 100.0);
        $boleto = new Boleto(200.0);

        $boletos = new ArrayObject();
        $boletos->append($boleto);

        $processador->processa($boletos, $fatura);

        
        $this->assertTrue($fatura->isPago());
    }

    public function testNaoDeveMarcarFaturaComoPagaCasoBoletoUnicoNaoPagueTudo()
    {
        $processador = new ProcessadorDeBoletos();
        
        $fatura = new fatura('Cliente', 200.0);
        $boleto = new Boleto(100.0);

        $boletos = new ArrayObject();
        $boletos->append($boleto);

        $processador->processa($boletos, $fatura);

        
        $this->assertFalse($fatura->isPago());
    }

    public function testDeveMarcarFaturaComoPagaCasoVariosBoletosPaguemTudo()
    {
        $processador = new ProcessadorDeBoletos();
        
        $fatura = new fatura('Cliente', 200.0);
        $boleto = new Boleto(100.0);
        $boleto2 = new Boleto(100.0);

        $boletos = new ArrayObject();
        $boletos->append($boleto);
        $boletos->append($boleto2);

        $processador->processa($boletos, $fatura);

        $this->assertTrue($fatura->isPago());
    }

    public function testNaoDeveMarcarFaturaComoPagaCasoVariosBoletosNaoPaguemTudo()
    {
        $processador = new ProcessadorDeBoletos();
        
        $fatura = new fatura('Cliente', 300.0);
        $boleto = new Boleto(100.0);
        $boleto2 = new Boleto(100.0);

        $boletos = new ArrayObject();
        $boletos->append($boleto);
        $boletos->append($boleto2);

        $processador->processa($boletos, $fatura);

        $this->assertFalse($fatura->isPago());
    }
}
