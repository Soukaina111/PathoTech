<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $fillable = ['Ref_Bloc', 'Bloc_Id', 'Decal_Id'];


    public function blocs()
    {
        return $this->hasMany(Bloc::class);
    }
    public function decals()
    {
        return $this->hasMany(Decals::class);
    }
}
