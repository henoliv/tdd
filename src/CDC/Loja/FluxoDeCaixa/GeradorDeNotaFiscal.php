<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\NotaFiscal;
use CDC\Loja\FluxoDeCaixa\Pedido;
use CDC\Loja\FluxoDeCaixa\NFDao;
use CDC\Loja\FluxoDeCaixa\SAP;
use DateTime;

class GeradorDeNotaFiscal
{
    private $acoes;
    
    public function __construct()
    {
        $acoes = func_get_args();
        $this->acoes = is_array($acoes) ? $acoes : [];
    }

    public function gera(Pedido $pedido)
    {
        $nf = new NotaFiscal(
            $pedido->getCliente(),
            $pedido->getValorTotal() * 0.94,
            new DateTime
        );
        
        foreach ($this->acoes as $acao) {
            $acao->executa($nf);
        }
        
        return $nf;
    }
}
