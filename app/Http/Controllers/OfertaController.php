<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function index()
    {
        return view('ofertas.index');
    }

    public function show(Oferta $oferta)
    {
        return view('ofertas.show', compact('oferta'));
    }
}