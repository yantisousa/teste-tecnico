<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use Exception;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function index()
    {   
            
            $marcas = Marcas::withCount('eletrodomesticosRelacionamento')->orderBy('nome', 'asc')->get();
            return response()->json($marcas);
        
        
    }
}
