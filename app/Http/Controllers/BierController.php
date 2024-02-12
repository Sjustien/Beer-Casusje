<?php

namespace App\Http\Controllers;

use App\Models\Bier;
use App\Models\Comment;
use Illuminate\Http\Request;

class BierController extends Controller
{
    public function index(){
        $bier = Bier::paginate(25);

        return view('bier/index', compact('bier'));
    
    }
    public function show(Bier $bier){
        $comments = $bier->comments;
        
        return view('bier/show', compact('bier','comments'));
    
    }
    
    

}
