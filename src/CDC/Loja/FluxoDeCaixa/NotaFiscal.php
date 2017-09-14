<?php

namespace CDC\Loja\FluxoDeCaixa;

use DateTime;

class NotaFiscal
{
    private $cliente;
    private $valor;
    private $data;

    public function __construct(
        string $cliente,
        float $valor,
        DateTime $data
    ) {
    
        $this->cliente = $cliente;
        $this->valor = $valor;
        $this->data = $data;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getData()
    {
        return $this->data;
    }
}
