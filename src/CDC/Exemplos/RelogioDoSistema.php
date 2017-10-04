<?php

namespace CDC\Exemplos;

use CDC\Exemplos\RelogioInterface;
use Datetime;

class RelogioDoSistema implements RelogioInterface
{
    public function hoje()
    {
        return Datetime::createFromFormat('Y-m-d', date('Y-m-d'));
    }
}
