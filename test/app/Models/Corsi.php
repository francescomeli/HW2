<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corsi extends Model {
    public $timestamps=false;

    protected $table = 'corso';

    protected $fillable = [
        'codice_c', 'orario', 'nome_c', 'costo', 'istruttore', 'immagine', 'descrizione'
    ];

    public function collegamentoPiscina(){
        return $this->belongsToMany("App\Models\Piscine","offerta","id_corso","piscina");
    }
}


?>