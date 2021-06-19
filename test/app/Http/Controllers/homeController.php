<?php

use Illuminate\Routing\Controller;          
use App\Models\User;
use App\Models\Piscine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class homeController extends Controller{
    
    public function home(){
        if(session('identificativo')!=null){
            $id=session('identificativo');
            return view("Homework_1")->with('nome',$id);
        }
        
        return view('Homework_1');
    }

    public function sport($query){
        $json=Http::get("https://sports.api.decathlon.com/sports/".$query);

        return $json;
    }

    public function carica_sport($query){
        $id=session('identificativo');

        $salvataggio=User::where('username',$id)->update([
            'sport'=>$query
        ]);
    }

    public function leggi(){
        $id=session('identificativo');
        /**"SELECT * FROM utente WHERE username = \"$username\""; */
        return User::all()->where("username",$id);
    }

}