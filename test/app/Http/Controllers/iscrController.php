<?php

use Illuminate\Routing\Controller;          
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
 
class iscrController extends Controller{
    public function iscrizione(){
        $error=false;
        return view('registrazione')->with('controllo',$error)->with('csrf_token',csrf_token());
    }

    public function registrazione(){
        $request=request();

        if($this->errori($request)===false){
            $iscritto=User::create([
                'username'=> $request['username'],
                'email'=> $request['email'],
                'nome'=> $request['nome'],
                'cognome'=> $request['cognome'],
                'data_nascita'=> $request['data_nascita'],
                'passw'=> password_hash($request['passw'],PASSWORD_DEFAULT),
            ]);
            return redirect('login');
        }
        else{
            $error=true;
            return view('registrazione')->with('controllo',$error)->with('csrf_token',csrf_token());
        }
    }

    private function errori($dati){     //controllo errori lato server
        $error=false;

        $username=User::where("username",$dati["username"])->first();
        if($username!=null){
            $error=true;
        }

        $email=User::where("email",$dati["email"])->first();
        if($email!=null){
            $error=true;
        }
        
        $password=$dati["passw"];
        if(strlen($password)<6){
            $error=true;
        }

        return $error;
    }

    public function c_username($query){
        $conferma=User::where("username",$query)->exists();

        if($conferma!=null){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function c_email($query){
        $conferma=User::where("email",$query)->exists();

        if($conferma!=null){
            return 1;
        }
        else{
            return 0;
        }
    }
}