<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prelevement extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'NumeroAnapath',  'DateManipulation', 'Type', 'Description','Commentaire', 'NombreBlocs', 'NombreBiopsie', 'User_Id'];
    //protected $fillable = ['id', 'NumeroAnapath', 'Service_Id', 'Organe', 'DateManipulation', 'Type', 'Description','Commentaire', 'NombreBlocs', 'NombreBiopsie', 'User_Id'];

    // protected $table = 'Prelevements';

    // prelevement belongs to one service
   /* public function service()
    {
        return $this->belongsTo(Service::class, 'Service_Id');
    }*/

    public function user()
    {
        return $this->belongsTo(User::class,'User_Id');
        
    }

    // Prelevements has many blocs 
    public function blocs()
    {
        return $this->hasMany(Bloc::class);
    }
    //PRELEVEMENT HAS MANY LARYNX
    public function larynx()
    {
        return $this->hasMany(Larynx::class);
    }
    //PRELEVEMENT HAS MANY Retino
    public function retino()
    {
        return $this->hasMany(Retino::class);
    }

}
