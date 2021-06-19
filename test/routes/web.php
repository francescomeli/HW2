<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Homework_1');
});

Route::get("homepage","homeController@home")->name("homepage");
Route::get("homepage/cercaSport","homeController@leggi");
Route::get("homepage/ricerca/{query}","homeController@sport");
Route::get("homepage/caricaSport/{query}","homeController@carica_sport");

Route::get("login","logController@login")->name("login");
Route::get("logout","logController@logout")->name("logout");
Route::post("login","logController@controllo_login");


Route::get("iscrizione","iscrController@iscrizione")->name("iscrizione");
Route::post("iscrizione","iscrController@registrazione");
Route::get("iscrizione/username/{query}","iscrController@c_username"); 
Route::get("iscrizione/email/{query}","iscrController@c_email"); 

Route::get("piscine","piscinaController@piscine")->name("piscine");
Route::get("piscine/caricamento_piscine","piscinaController@caricaPiscine");
Route::get("piscine/caricamento_preferiti","piscinaController@caricaPreferiti");
Route::get("piscine/rimuovi/{query}","piscinaController@rimozione");
Route::get("piscine/aggiungi/{query}","piscinaController@inserimento");
Route::get("piscine/operazione/{query}","piscinaController@gestisci");

Route::get("corsi","corsoController@corsi")->name("corsi");
Route::get("corsi/caricamento_corsi","corsoController@caricaCorsi");

Route::get("relax","relaxController@visualizza")->name("relax");
Route::get("relax/cercaMusica","relaxController@leggi");
Route::get("relax/ricerca/{query}","relaxController@musica");
Route::get("relax/caricaMusica/{query}","relaxController@carica_musica");