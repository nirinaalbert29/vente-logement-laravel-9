<?php

namespace App\Http\Controllers;

use App\Models\Deuxieme;
use App\Models\Logement;
use App\Models\Vente;
use Illuminate\Http\Request;

class factureController extends Controller
{
    public function index(){
        return view('facture.factureVente');
    }

    public function facture(Request $request){
        $id_vente=$request->num_vente;
        $facture = Vente::join('clients', 'ventes.clients_id', '=', 'clients.id')
                    ->join('logements', 'ventes.num_log', '=', 'logements.id')
                   ->select('clients.nom_cli as nom_cli', 'clients.prenom_cli as prenom_cli', 'clients.tel_cli as tel_cli'
                   , 'clients.adresse_cli as adresse_cli', 'ventes.clients_id as id_cli', 'ventes.date_vente as date_vente'
                   , 'ventes.reste as reste', 'ventes.mode_paye as mode_paye',
                    'ventes.reste as reste','ventes.id as id_vente','ventes.montant_paye as montant_paye',
                    'ventes.type_vente as type_vente','logements.prix_log as prix_log',
                    'logements.num_log as num_log')
                   ->where('ventes.id','=',$id_vente)
                   ->get();
                   if ($facture->isEmpty()) {
                    return redirect('/facturationVente')->with('error',"Aucune valeur trouvé");
                } else {
                    return view('facture.appercuFactureVente',['factur'=>$facture]);
                }
    }

    public function deuxieme(){
        return view('facture.factureDeuxieme');
    }

    public function factureDeuxieme(Request $request){
        $id_vente=$request->num_vente;
        $facture = Deuxieme::join('clients', 'deuxiemes.clients_id', '=', 'clients.id')
                    ->join('logements', 'deuxiemes.logements_id', '=', 'logements.id')
                   ->select('clients.nom_cli as nom_cli', 'clients.prenom_cli as prenom_cli', 'clients.tel_cli as tel_cli'
                   , 'clients.adresse_cli as adresse_cli', 'deuxiemes.clients_id as id_cli', 'deuxiemes.created_at as date_vente'
                   ,'deuxiemes.id as id_vente','logements.num_log as num_log',
                   'deuxiemes.montant as montant_paye','logements.prix_log as prix_log')
                   ->where('deuxiemes.id','=',$id_vente)
                   ->get();
                   if ($facture->isEmpty()) {
                    return redirect('/facturationDeuxieme')->with('error',"Aucune valeur trouvé");
                } else {
                    return view('facture.appercuFactureDeuxieme',['factur'=>$facture]);
                }

    }
}
