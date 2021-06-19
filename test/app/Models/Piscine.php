<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piscine extends Model {
    public $timestamps=false;

    protected $table = 'piscina';

    protected $fillable = [
        'codice_p', 'corsie_tot', 'nome_p','immagine','descrizione'
    ];

    public function collegamentoUtente() {
        return $this->belongToMany("App\Models\User","valutazione_p","piscina","utente");
    }

    public function collegamentoCorsi(){
        return $this->belongsToMany("App\Models\Corsi","offerta","piscina","id_corso");
    }
}


?>