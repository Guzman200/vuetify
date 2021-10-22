<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    

    public function index(Request $request)
    {
        if($request->ajax()){

            $bodegas = Bodega::get();

            return response()->json($bodegas);
        }

    }

    public function destroy(Bodega $bodega)
    {
        $bodega->delete();

        return response()->json(['message' => 'Bodega eliminada'],200);
    }
}
