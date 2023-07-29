<?php

namespace App\Http\Controllers;

use App\Models\Eletrodomesticos;
use Exception;
use Illuminate\Http\Request;

class EletrodomesticosController extends Controller
{
    public function index()
    {
        try {
            $eletrodomesticos = Eletrodomesticos::with('marcasRelacionamento')->orderBy('nome', 'asc')->get();
            return response()->json($eletrodomesticos);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'nome' => 'required|unique:eletrodomesticos',
                'descricao' => 'required',
                'tensao' => 'required|min:3',
                'marca_id' => 'required',
            ]);
            if($validate && str_ends_with($request->tensao, 'v')){
                Eletrodomesticos::create($request->all());
            } else {
                throw new Exception();
            }
            return to_route('eletrodomesticos.index');
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function edit(Eletrodomesticos $eletrodomestico)
    {
        try {
            return response()->json($eletrodomestico);
        } catch (Exception $ex) {
            throw new Exception();
        }

    }

    public function update(Eletrodomesticos $eletrodomestico, Request $request)
    {
        try {
            $validate = $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
                'tensao' => 'required|min:3',
                'marca_id' => 'required',
            ]);
            if($validate && str_ends_with($request->tensao, 'v')){
                $eletrodomestico->update($request->all());
            }
        } catch (Exception $ex) {
            throw new Exception();
        }
    }

    public function destroy(Eletrodomesticos $eletrodomestico)
    {
        try {
            $eletrodomestico->delete();
            $eletrodomesticos = Eletrodomesticos::with('marcasRelacionamento')->orderBy('nome', 'asc')->get();
            return response()->json($eletrodomesticos);
        } catch (Exception $ex) {
            throw new Exception();
        }
    }
}
