<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vente;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $Client = Client::latest()->paginate(4);
        return view('Interface.client',['Client'=>$Client]);
    }
    public function getspec() {
        $Client = Client::latest()->paginate(10);
        return view('Interface.client',['Client'=>$Client]);
    }
    public function create() {
        $Client = Client::get();
        return view('Interface.new');
    }

    public function store(Request $request) {
        $client = new Client();
        $client->nom_cli=$request->nom_cli;
        $client->prenom_cli=$request->prenom_cli;
        $client->adresse_cli=$request->adresse_cli;
        $client->lieu_cli=$request->lieu_cli;
        $client->tel_cli=$request->tel_cli;
        $client->save();
        return redirect('/clients')->withSuccess('Client bien ajouter avec succé');
    }

    public function edit($id){
        $client = Client::where('id',$id)->first();
        return view('Interface.edit',['client'=>$client]);
    }

    public function update(Request $request,$id){
        $client = Client::where('id',$id)->first();
        $client->nom_cli=$request->nom_cli;
        $client->prenom_cli=$request->prenom_cli;
        $client->adresse_cli=$request->adresse_cli;
        $client->lieu_cli=$request->lieu_cli;
        $client->tel_cli=$request->tel_cli;
        $client->save();
        return redirect('/clients')->withSuccess('Client bien modifié avec succé');
    }

    public function destroy($id){
        $client = Client::whereId($id)->first();
        try {
            $client->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            $error_message = "Une erreur est survenue lors de la suppression du client,le client qui a déjà fait un vente ne peut pas supprimer!: ";
            return redirect('/clients')->with('error', $error_message);
        }
        return redirect('/clients')->with('successDelete', "Suppression client succes");
    }

    public function dette(){
        $endette = Vente::join('clients', 'ventes.clients_id', '=', 'clients.id')
                   ->select('clients.nom_cli as nom_cli', 'clients.prenom_cli as prenom_cli', 'clients.tel_cli as tel_cli', 'clients.adresse_cli as adresse_cli', 'ventes.clients_id as id_cli', 'ventes.date_vente as date_vente', 'ventes.reste as reste', 'ventes.num_log as num_log')
                   ->where('ventes.reste','>','0')
                   ->groupBy('ventes.clients_id', 'clients.nom_cli', 'clients.prenom_cli','clients.tel_cli','clients.adresse_cli','ventes.date_vente','ventes.reste','ventes.num_log')
                   ->get();
        return view('Interface.endette',['endette'=>$endette]);
    }
}
