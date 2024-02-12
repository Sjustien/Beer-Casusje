<?php

namespace App\Http\Controllers;

use App\Models\Bier;
use Illuminate\Http\Request;

class BierController extends Controller
{
    public function index(){
        $bier = Bier::all();

        return view('home', compact('bier'));
    
    }
}
