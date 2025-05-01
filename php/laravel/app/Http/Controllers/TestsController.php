<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use PHPUnit\TextUI\Application;

class TestsController extends Controller
{
    public function index(): Factory|Application|View
    {
        return view('tests.index');
    }

    public function login(): Factory|Application|View
    {
        return view('tests.login');
    }
}
