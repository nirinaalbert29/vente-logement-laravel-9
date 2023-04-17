<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\Logement;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    public function index() {
        $Logement = Logement::where('statut','=','disponible')->paginate(8);
        return view('logement.logement',['Logement'=>$Logement]);
    }
    public function indispo() {
        $Logement = Logement::where('statut','=','indisponible')->paginate(8);
        return view('logement.logementIndispo',['Logement'=>$Logement]);
    }
    public function create() {
        $Logement = Logement::get();
        $Cite = Cite::get();
        return view('logement.newLogement',['Cite'=>$Cite]);
    }
    public function ajout(Request $request) {

        //validate data
        $request->validate([
            'num_log' => 'required|unique:logements|max:200'
        ]);
        $statu="disponible";
        $logement = new Logement;
        $logement->num_log=$request->num_log;
        $logement->nb_chambre=$request->nb_chambre;
        $logement->superficie=$request->superficie;
        $logement->lib_cite=$request->lib_cite;
        $logement->prix_log=$request->prix_log;
        $logement->statut=$statu;
        $logement->save();
        return redirect('/logementsListe')->withSuccess('Logement bien ajouter avec succé');
    }

    public function edit($id){
        $logement = Logement::where('id',$id)->first();
        return view('logement.editLogement',['logement'=>$logement]);
    }
    public function update(Request $request,$id){
        $logement = Logement::where('id',$id)->first();
        $logement->num_log=$request->num_log;
        $logement->nb_chambre=$request->nb_chambre;
        $logement->superficie=$request->superficie;
        $logement->lib_cite=$request->lib_cite;
        $logement->prix_log=$request->prix_log;
        $logement->save();
        return redirect('/logementsListe')->withSuccess('Logement bien modifié avec succé');
    }
    public function supprimer($id){
        $logement = Logement::whereId($id)->first();
        $logement->delete();
        return redirect('/logementsListe')->with('successDelete','Logement bien supprimé avec succé');
    }

}
