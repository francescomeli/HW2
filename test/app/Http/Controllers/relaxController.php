<?php

use Illuminate\Routing\Controller;          
use App\Models\User;
use App\Models\Piscine;
use App\Models\Corsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class relaxController extends Controller{
    public function visualizza(){
        return view('arearelax')->with('csrf_token',csrf_token());
    }

    public function musica($query){
        $token=Http::asForm()->withHeaders([
            'Authorization' => 'Basic '.base64_encode(env('client_id').':'.env('client_secret')),
        ])->post("https://accounts.spotify.com/api/token", [
            'grant_type'=>'client_credentials',
        ]);

        if($token->failed()) return null;

        $json=Http::withHeaders([
            'Authorization'=> 'Bearer '.$token['access_token']
        ])->get("https://api.spotify.com/v1/search", [
            'type'=>"playlist",
            'q'=>$query
        ]);

        if(!$json->successful()) return null;
        return $json;
    }

    public function carica_musica($query){
        $id=session('identificativo');

        $salvataggio=User::where('username',$id)->update([
            'playlist'=>$query
        ]);
    }

    public function leggi(){
        $id=session('identificativo');
        /**"SELECT * FROM utente WHERE username = \"$username\""; */
        return User::all()->where("username",$id);
    }
}