<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Logement;
use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function index() {
        // $logements= Vente::join('logements', 'ventes.num_log', '=', 'logements.id')
        //             ->select('logements.num_log as num_log', 'ventes.num_log as id_log', 'ventes.clients_id as id_cli')
        //             ->groupBy('ventes.num_log', 'logements.num_log', 'ventes.clients_id')
        //             ->where('reste','!=','0')
        //             ->get();
        $Vente  =  Vente::join('logements', 'ventes.num_log', '=', 'logements.id')
                     ->join('clients', 'ventes.clients_id', '=', 'clients.id')
                     ->select('logements.num_log as num_log', 'ventes.clients_id as clients_id','ventes.id as id',
                     'ventes.type_vente as type_vente','ventes.mode_paye as mode_paye','ventes.date_vente as date_vente',
                     'ventes.montant_paye as montant_paye','ventes.reste as reste','clients.nom_cli as nom_cli')
                     ->get();
        return view('Vente.VenteListe',['Vente'=>$Vente]);
    }

    public function create(){
        $Logements=Logement::where('statut','=','disponible')->get();
        $Clients=Client::get();
        return view('Vente.newVente',['Logements'=>$Logements,'Clients'=>$Clients]);
    }

    public function store(Request $request) {

        //validate data

        $Vente = new Vente;
        $Vente->clients_id=$request->id_cli;
        $Vente->num_log=$request->num_log;

        $lg=$logement = Logement::where('id',$request->num_log)->first();
        $price=$lg->prix_log;
        $demi_price=$price/2;
        $paye=$request->montant_paye;
        $mode_p=$request->mode_paye;
        if($mode_p=='Une tranche' && $paye!=$price){
            return redirect('/vente-create')->withErrors('Votre montant payee ne suffit pas pour votre choit de payer en Une seul Tranche, Reesayer et placez  montant de ( :'.$price.'Ar ) pour acheter le logement :'.$logement->num_log.'');
        }
        else{
            if($paye<$demi_price){
                return redirect('/vente-create')->withErrors('Vous devez payer au moins 50% de prix pour la premier tranche ( :'.$demi_price.'Ar ) pour acheter le logement '.$logement->num_log.'');
            }

            else{
                $log=$request->num_log;
                $statu_upd="indisponible";
                $logem = Logement::where('id',$log)->first();
                $logem->statut=$statu_upd;
                $logem->save();

                $logement = Logement::where('id',$log)->first();
                $prix=$logement->prix_log;
                $mont=$request->montant_paye;
                $reste=$prix-$mont;

                $Vente->type_vente=$request->type_vente;
                $Vente->mode_paye=$request->mode_paye;
                $Vente->date_vente=$request->date_vente;
                $Vente->montant_paye=$request->montant_paye;
                $Vente->reste=$reste;
                $Vente->save();
                return redirect('/VenteListe')->withSuccess('Vente bien validee avec succé');
            }
        }


    }

    public function edit($id){
        $Logements=Logement::get();
        $Clients=Client::get();
        $Ventes = Vente::where('id',$id)->first();
        return view('Vente.editVente',['Ventes'=>$Ventes,'Logements'=>$Logements,'Clients'=>$Clients]);
    }

    public function update(Request $request,$id){
        $Vente = Vente::where('id',$id)->first();
        $Vente->clients_id=$request->id_cli;
        $Vente->num_log=$request->num_log;

        $log=$request->num_log;
        $logement = Logement::where('id',$log)->first();
        $prix=$logement->prix_log;
        $mont=$request->montant_paye;
        $reste=$prix-$mont;

        $Vente->type_vente=$request->type_vente;
        $Vente->mode_paye=$request->mode_paye;
        $Vente->date_vente=$request->date_vente;
        $Vente->montant_paye=$request->montant_paye;
        $Vente->reste=$reste;
        $Vente->save();


        return redirect('/VenteListe')->withSuccess('Vente bien modifié avec succé');
    }

    public function destroy($id){
        $Vente = Vente::whereId($id)->first();
        $Vente->delete();
        return redirect('/VenteListe')->withSuccess('Suppresion de vente réussit!');

    }


}
