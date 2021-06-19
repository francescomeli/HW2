<?php

use Illuminate\Routing\Controller;          
use App\Models\User;
use App\Models\Piscine;
use App\Models\Corsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class piscinaController extends Controller{
    public function piscine(){
        $piscina=Piscine::all();
        return view('piscina')->with("piscine",$piscina)
                                ->with('csrf_token',csrf_token());
    }
    
    public function caricaPiscine(){
        return Piscine::all();
    }

    /* 
    public function caricaPreferiti(){
        if(session("identificativo")!=null){
            $nome=session("identificativo");
            return DB::select("SELECT * 
                            FROM (valutazione_p val join piscina p on val.piscina=p.codice_p) join utente u on val.utente=u.codice_utente 
                            WHERE u.username=\"$nome\"");
        }
    }
    */
    public function caricaPreferiti(){
        if(session("identificativo")!=null){
            $nome=session("identificativo");
            return Piscine::join("valutazione_p","valutazione_p.piscina_v","piscina.codice_p")
                            ->join("utente","utente.codice_utente","valutazione_p.utente")
                            ->where("utente.username",$nome)
                            ->get();
        }
    }

    /*
    public function rimozione($query){
        if(session("identificativo")!=null){
            $nome=session("identificativo");
            return DB::select("DELETE FROM valutazione_p WHERE utente = (SELECT codice_utente
                                                                         FROM utente u
                                                                         WHERE u.username=\"$nome\") AND piscina = (SELECT codice_p 
                                                                                                                    FROM PISCINA
                                                                                                                    WHERE nome_p=\"$query\")");
        }
    }
    */
    public function rimozione($query){
        if(session("identificativo")!=null){
            $nome=session("identificativo");
            $userna = User::where("username",$nome)->get("codice_utente")->first();
            $piscina = Piscine::where("nome_p",$query)->get("codice_p")->first();
            
            $rimuovi = User:: join("valutazione_p","valutazione_p.utente", "utente.codice_utente")
                            ->join("piscina","piscina.codice_p","valutazione_p.piscina_v")
                            ->where("valutazione_p.utente",$userna->codice_utente)
                            ->where("valutazione_p.piscina_v",$piscina->codice_p)
                            ->get("valutazione_p.codice_valutazione")->first();

            Piscine::from("valutazione_p")->where("codice_valutazione",$rimuovi->codice_valutazione)->delete();       
                            
        }
    }

    /*
    public function inserimento($query){
        if(session("identificativo")!=null){
            $nome=session("identificativo");
            $identificativo=User::where('username', $nome)->get("codice_utente")->first();
            return DB::select("INSERT INTO valutazione_p(utente,piscina_v) VALUES (\"$identificativo->codice_utente\",(SELECT codice_p 
                                                                                            FROM PISCINA
                                                                                            WHERE nome_p=\"$query\"))");
        }
    }
    */
    public function inserimento($query){
        if(session("identificativo")!=null){
            $nome=session("identificativo");
            $userna = User::where("username",$nome)->get("codice_utente")->first();
            $piscina = Piscine::where("nome_p",$query)->get("codice_p")->first();
          
            $aggiungi=User::from("valutazione_p")
                    ->create(); 

            User::from("valutazione_p")->insert([
                    "valutazione_p.codice_valutazione"=>$aggiungi->id,            /**in automatico orm se non specifico nome mi mette id */
                    "valutazione_p.utente"=>$userna->codice_utente,
                    "valutazione_p.piscina_v"=>$piscina->codice_p
            ]);
        }
    }
    
    /*
    public function gestisci($query){         
        return DB::select("SELECT c.nome_c, c.orario, c.istruttore, c.immagine
                            FROM (offerta o join corso c on o.id_corso=c.codice_c) join piscina p on o.piscina=p.codice_p
                            WHERE p.codice_p=$query");
    }
    */
    public function gestisci($query){
        if(session("identificativo")!=null){
            return Corsi::join("offerta","offerta.id_corso","corso.codice_c")
                        ->join("piscina","piscina.codice_p","offerta.piscina")
                        ->where('piscina.codice_p',$query)
                        ->get();
        }
    }
}