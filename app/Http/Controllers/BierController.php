<?php

namespace App\Http\Controllers;

use App\Models\Bier;
use Illuminate\Http\Request;

class BierController extends Controller
{
    public function index(){
        $bier = Bier::all();

        return view('bier/index', compact('bier'));
    
    }
    public function show(Bier $bier){

        return view('bier/show', compact('bier'));
    
    }
    

}
