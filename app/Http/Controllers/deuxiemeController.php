<?php

namespace App\Http\Controllers;

use App\Models\Deuxieme;
use App\Models\Logement;
use App\Models\Vente;
use Illuminate\Http\Request;

class deuxiemeController extends Controller
{
    public function index(){
        $deuxieme = Deuxieme::join('logements', 'deuxiemes.logements_id', '=', 'logements.id')
        ->join('clients', 'deuxiemes.clients_id', '=', 'clients.id')
        ->select('logements.num_log as num_log', 'deuxiemes.clients_id as clients_id','deuxiemes.id as id',
        'deuxiemes.montant as montant','deuxiemes.created_at as created_at','clients.nom_cli as nom_cli')
        ->get();
        return view('Vente.deuxiemeListe',['deuxieme'=>$deuxieme]);
    }
    public function create(){
        $resultats = Vente::join('clients', 'ventes.clients_id', '=', 'clients.id')
                   ->select('clients.nom_cli as nom_cli', 'clients.prenom_cli as prenom_cli', 'clients.tel_cli as tel_cli', 'ventes.clients_id as id_cl')
                   ->groupBy('ventes.clients_id', 'clients.nom_cli', 'clients.prenom_cli','clients.tel_cli')
                   ->where('reste','!=','0')
                   ->get();

        $logements= Vente::join('logements', 'ventes.num_log', '=', 'logements.id')
                    ->select('logements.num_log as num_log', 'ventes.num_log as id_log', 'ventes.clients_id as id_cli')
                    ->groupBy('ventes.num_log', 'logements.num_log', 'ventes.clients_id')
                    ->where('reste','!=','0')
                    ->get();
        return view('Vente.deuxieme_tranche',['resultats'=>$resultats,'logements'=>$logements]);
    }

    public function store(Request $request){
        $deuxieme = new Deuxieme();
        $deuxieme->clients_id=$request->cli;
        $deuxieme->logements_id=$request->log;
        $deuxieme->montant=$request->montant_d;

        // $cli=$request->cli;
        //$mont=$request->montan;
        // $rest=0;

        $Vente = Vente::where('clients_id','=',$request->cli,'AND','num_log','=',$request->log)->first();
        //$logements = Logement::where('id',$request->log)->first();
        $reste=$Vente->reste;
        if($reste!=$request->montant_d){
            return redirect('/deuxieme_create')->withErrors('Veuillez reesayer et paye de montant de '.$reste.'Ar');
        }
        else{

            $Vente->montant_paye += $request->montant_d;
            $Vente->reste=0;
            $Vente->save();

            $deuxieme->save();
            return redirect('/deuxiemeListe')->withSuccess('Vous avez payés tout le prix de logement!');
        }


    }
}
