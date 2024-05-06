<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;

    //Da inserire nel momento in cui vogliamo creare la colonna nel nostro database per appunto il SoftDelete.

    use SoftDeletes;

    //Le Fillable sono coloro che ci permettono di "pulire" il Controller utilizzato per i valori che diamo invece come Fillable.
    //Esse servono anche per un fattore di Validazione, nel senso che tramite esse decidiamo cosa dare a vedere.
    protected $fillable = ['title', 'description', 'type_id'];

    public function type() {
        
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        
        return $this->belongsToMany(Technology::class);
    }
}
