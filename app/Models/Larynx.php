<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Larynx extends Model
{
    use HasFactory;
    protected $table = 'larynx';
                          //
	
  

    protected $fillable = ['id'	,'Prv_Id'	,'Etat'	,'H'	,'L'	,'DAP'	,'EG'	,'ESG'	,'ESOUSG'	,'ESPG'	,'ESPD', 'AT'	,'HT'	,'LT'	,'DAPT'	,'L_tumeur'	,'ICVD'	,'ICVG'	,'ICA'	,'ICP'	,'IRAD'	,'IRAG'	,'IHTE'	,'ICCT'	,'ICCC'	,'ICCAD'	,'ICCAG'	,'IERC'	,'IEPD'	,'IEPG'	,'LL'	,'LTRA'	,'LANT'	,'LPOST','COMM'	,'TTH'	,'DD'	,'EV'	,'EP'	,'SI'	,'LBL',	'Limite_TR'	,'limite_ant'	,'limite_Post','GGDT','GGDT2','GGDT3','GGDT4','GGDNI'	,'GGDNI3','GGDNI2','GGDNI4','GGDNM','GGDNM2','GGDNM3','GGDNM4','GGDTM','GGDTM2','GGDTM3','GGDTM4','GGDEC'	,'GGGT'	,'GGGT2','GGGT3','GGGT4','GGGNI2','GGGNI3','GGGNI4','GGGNI','GGGNM','GGGNM2','GGGNM3','GGGNM4','GGGTM','GGGTM2','GGGTM3','GGGTM4','GGGEC','COMMENTAIRE'	,'Stade'];


     // larynx belongs to one Prelevement 
  public function prelevement()
  {
    return $this->belongsTo(Prelevement::class, 'Prelevement_Id');
  }
 
}
