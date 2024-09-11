<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloc extends Model

{
  protected $fillable = ['Prelevement_Id', 'Reference_Bloc', 'Cassettes', 'Fragments', 'Siege', 'Commentaire', 'Reste', 'Decals'];

  use HasFactory;

  // bloc belongs to one Prelevement 
  public function prelevement()
  {
    return $this->belongsTo(Prelevement::class, 'Prelevement_Id');
  }


  // Bloc has many demandes 
  public function demande()
  {
    return $this->hasMany(demande::class);
  }

  // Bloc has many decals
  public function decals()
  {
    return $this->hasMany(Decals::class);
  }

  public function panier()
  {
    return $this->belongsTo(Panier::class, 'Bloc_Id');
  }
}
