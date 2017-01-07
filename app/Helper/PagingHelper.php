<?php

namespace App\Helper;

class PagingHelper
{
    public $current = 1;

    public $total = 0;

    public $limit = 30;

    public function __construct($total = 0, $limit = 30, $symbol = 'po')
    {
        $this->current = empty($_GET[$symbol]) ? 1 : $_GET[$symbol];
        $this->total = $total;
        $this->limit = $limit;
    }
}
