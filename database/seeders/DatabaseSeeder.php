<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Prelevement;
use App\Models\Bloc;
use App\Models\User;
use App\Models\Demande;
use App\Models\Retino;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
        
        Demande::create([
            'Id_Bloc' => '4',
            'Id_User' => '3',
            'Type_D' => 'Recoupe',
            'Commentaire_D' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'Degree_Reinclusion' => 90,
            'Nombre_Recoupe' => 2,
            'Date_Demande' => '2022-07-07',
        ]);
        Demande::create([
            'Id_Bloc' => '9',
            'Id_User' => '3',
            'Type_D' => 'Coloration',
            'Commentaire_D' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'Type_Coloration' => 'deep',
            'Date_Demande' => '2022-07-07',
        ]);
        Demande::create([
            'Id_Bloc' => '1',
            'Id_User' => '3',
            'Type_D' => 'IHC',
            'Commentaire_D' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'Panel_Marquage' => 'chi panel',
            'Date_Demande' => '2022-07-07',
        ]);
       

       
      
    }
}
