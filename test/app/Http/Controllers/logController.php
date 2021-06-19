<?php

use Illuminate\Routing\Controller;          
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class logController extends Controller{   

    public function login(){
        if(session("identificativo")!=null){
            return redirect("homepage");
        }
        else{
            $errore=false;
            return view('login')->with('controllo',$errore)->with('csrf_token',csrf_token());
        }
    }

    public function controllo_login(){
        $user = User::where('username', request('username'))->where('passw',password_verify('passw',request('passw')))->first();

        if($user!=null){
            Session::put('identificativo',$user->username);
            return redirect("homepage");
        }
        else{
            $errore=true;
            return view('login')->with('controllo',$errore)->with('csrf_token',csrf_token());
        }
    }

    public function logout(){
        Session::flush();
        return redirect('homepage');
    }
}
