<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Http\Request;

class statistiqueController extends Controller
{
    public function stat(){
        $statistique = Logement::where('statut','indisponible')->get();
        return view('statistique.statistiqueVente',['statistique'=>$statistique]);
    }
}
