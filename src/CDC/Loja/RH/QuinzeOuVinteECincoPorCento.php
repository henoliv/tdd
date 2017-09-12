<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\RegraDeCalculo;
use CDC\Loja\RH\Funcionario;

class QuinzeOuVinteECincoPorCento extends RegraDeCalculo
{
    protected function limite()
    {
        return 2500;
    }

    protected function porcentagemAcimaDoLimite()
    {
        return 0.75;
    }

    protected function porcentagemBase()
    {
        return 0.85;
    }
}
