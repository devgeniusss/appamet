<?php

namespace App\Http\Controllers;

use App\Models\Domain;

abstract class Controller
{
    protected $currentDomainId;

    public function __construct()
    {
        $this->currentDomainId = currentDomainId();
    }
}
