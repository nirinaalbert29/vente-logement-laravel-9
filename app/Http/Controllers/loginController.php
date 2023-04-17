<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
        return view('login.login');
    }

    public function login(Request $request){
        if($request->user=="alain" && $request->mdp=="nirina"){
            $Cites = Cite::latest()->paginate(10);
        return view('Cite.cite',['Cites'=>$Cites]);
        }
        else{
            return redirect('/')->with('error','mot de passe ou username incorrecte');
        }
    }
}
