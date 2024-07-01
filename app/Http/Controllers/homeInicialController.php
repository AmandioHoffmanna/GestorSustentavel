<?php

namespace App\Http\Controllers;

class homeInicialController extends Controller
{
    public function index()
    {
        return view('homeInicial.index');
    }

}