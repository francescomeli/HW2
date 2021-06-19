<?php

use Illuminate\Routing\Controller;          
use App\Models\User;
use App\Models\Corsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class corsoController extends Controller{
    public function corsi(){
        return view("corso")->with("csrf_token",csrf_token());
        
    }

    public function caricaCorsi(){
        return Corsi::all();
    }

}
 