<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = ['id','Reference_Bloc','Type_Ref', 'Date_Demande', 'Id_User', 'Type_D', 'Statut', 'Commentaire_D', 'Degree_Reinclusion', 'Nombre_Recoupe', 'Panel_Marquage', 'Type_Coloration','tests'];


    public function user()
    {
        return $this->belongsTo(User::class, 'Id_User');
    }

    public function scopeFilter(){

    }
}
