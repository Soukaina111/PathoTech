<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retino extends Model
{
    use HasFactory;
    protected $table = 'retino';


    protected $fillable = ['PROC', 'LATE','image', 'DAP', 'DH', 'DV', 'LNO', 'PGD', 'EtaP', 'TT', 'AT', 'Autre', 'TL', 'CTHN', 'TV', 'Pour', 'FD', 'Descr', 'ENO', 'ENOP', 'EC', 'ECP', 'ES', 'ESP', 'ECA', 'ME', 'Au', 'Comm', 'Cara', 'PTNM', 'PT', 'N', 'M', 'Prv_Id'];

       // Retino belongs to one Prelevement 
  public function prelevement()
  {
    return $this->belongsTo(Prelevement::class, 'Prelevement_Id');
  }
}
