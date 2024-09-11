<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
          
        ]);

        $data = [
            'name' => $request['name'],
            'role' => $request['role'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])

        ];
        
        $user = User::create($data);
        
        auth()->login($user);
        
        return redirect()->to('/bienvenue');
    }


    public function destroy(User $prv)
    {
        $prv->delete();
        return redirect()->route('/bienvenue')->with('deleted', 'Utilisateur supprimé avec Succes');
    }


  



    //
}

