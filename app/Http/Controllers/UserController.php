<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            return response()->json(User::get());
        }
    }

    public function datosGrafica(Request $request)
    {
        return response()->json([100,152,78,44,125,38,89,90,100,120,145,100]);
    }
}
