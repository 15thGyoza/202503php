<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public ?int $perPage = null;

    public function __construct()
    {
        $this->perPage = config('app.per_page', 5);
    }
}
