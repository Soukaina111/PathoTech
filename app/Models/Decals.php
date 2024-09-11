<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decals extends Model
{
    use HasFactory;

    protected $fillable = [
        'Reference_Decal',
        'Bloc_Id',
        'Prelevement_Id'
    ];


    // decal belongs to one bloc
    public function bloc()
    {
        return $this->belongsTo(Bloc::class, 'Bloc_Id');
    }

    public function panier()
    {
        return $this->belongsTo(Panier::class, 'Decal_Id');
    }
}
