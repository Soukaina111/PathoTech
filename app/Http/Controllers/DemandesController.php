<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Demande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Bloc;
use Illuminate\Validation\Rules\Exists;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

use function PHPUnit\Framework\isEmpty;

class DemandesController extends Controller
{

    public function search(Request $request)
    {

        $search_text = $_GET['query'];
       
       
        $demandes = Demande::where('Reference_Bloc', 'LIKE', '%' . $search_text . '%')->
        orWhere('type_Coloration','LIKE', '%' . $search_text . '%')->
        orWhere('tests','LIKE', '%' . $search_text . '%')->
        orWhere('Type_D','LIKE', '%' . $search_text . '%')->
        orWhere('Status','LIKE', '%' . $search_text . '%')->
        orWhere('Date_Demande','LIKE', '%' .date("Y-m-d", strtotime($search_text))  . '%')->
        orWhere('Panel_Marquage','LIKE','%' . $search_text . '%')->paginate(10) ->appends(request()->query());;

       
         return view('demande.search', compact('demandes'));

    
    }

    public function detailsDemandes(){

        $demandes = Demande::all()->groupBy(auth()->user()->id)->paginate(10);
        return view('detailsDemande', compact('$demandes'));
    }



    public function mine()
    {
        $demandes = Demande::where('Id_User', '=', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);

        return view('demande.MesDemandes', compact('demandes'));
    }

    private function validerDemande(Demande $de)
    {
        $de->Status = 'Validée';

        $de->update();
        return redirect()->back();
     
    }

    public function destroy(Demande $de)
    {
        
        $de->delete();
        return redirect()->route('M_Demandes')->with('deleted', 'Demande  Supprimée ');

    }




    public function status(Demande $de)
    {
       
        $de->Status = 'Validée';
        $de->update(); 
        
       
        if ($de->Type_D == 'Recoupe') {

            return redirect()->route('RECOUPE.attente');
        }
        if ($de->Type_D == 'Coloration') {
            return redirect()->route('COLORATION.attente');
        }
        if ($de->Type_D == 'IHC') {
            return redirect()->route('IHC.attente');
        }
        if ($de->Type_D == 'Biologie Moléculaire') {
            return redirect()->route('BIOMOL.attente');
        }
    }




    private function validerD($id){

        $de = Demande::find($id);
        $de->Status = 'Validée';

        $de->save();
        if ($de->Type_D == 'Recoupe') {

            return redirect()->route('RECOUPE.attente');
        }
        if ($de->Type_D == 'Coloration') {
            return redirect()->route('COLORATION.attente');
        }
        if ($de->Type_D == 'IHC') {
            return redirect()->route('IHC.attente');
        }
        if ($de->Type_D == 'Biologie Moléculaire') {
            return redirect()->route('BIOMOL.attente');
        }



    }
    private function Print($id){
        $de = Demande::find($id);
        

        if ($de->Type_D == 'Recoupe') {
            return view('demande.recoupe.show', compact('demande'));
        }
        if ($de->Type_D == 'Coloration') {
            return redirect()->route('COLORATION.show');
        }
        if ($de->Type_D == 'IHC') {
            return redirect()->route('IHC.show');
        }
        if ($de->Type_D == 'Biologie Moléculaire') {
            return redirect()->route('BIOMOL.show');
        }




    }

    public function printDemandes(Request $request){

        $ids=$request->ids;
        foreach($ids as $id){
            $this->Print($id);
        }
        return redirect()->back();

    }

    public function validerBlocs(Request $request){
       

        $ids=$request->ids;
        foreach($ids as $id){
            $this->validerD($id);
        }

        return redirect()->back();
      
        }



    // RECOUPE FUNCTIONS

    public function index_RECOUPE()
    {
        $demandes = Demande::where('type_D', '=', 'Recoupe')->orderBy('id', 'desc')->paginate(10);
        return view('demande.recoupe.index', compact('demandes'));
    }

    public function create_RECOUPE()
    {
        $data['blocs'] = Bloc::orderBy('id')->get();
        return view('demande.recoupe.create', $data);
    }


    public function store_RECOUPE(Request $request)
    {

        $request->validate(
            [

                'Reference_Bloc' => 'required',
                'Type_Ref'=>'required',
                'nombre_recoupe' => 'required'

            ],
            [
                'Reference_Bloc.required' => 'Veuillez saisir une référence',
                'Type_Ref.required' => 'Champ obligatoire ',
                'nombre_recoupe.required' => 'Champ obligatoire'
            ]
        );
        $data = [

            'Reference_Bloc' => $request->Reference_Bloc,
            'Type_Ref'=>$request->Type_Ref,
            'Id_User' => auth()->user()->id,
            'Type_D' => 'Recoupe',
            'Commentaire_D' => $request->commentaire_D,
            'Degree_Reinclusion' => $request->degree_reinclusion,
            'Nombre_Recoupe' => $request->nombre_recoupe,
            'Date_Demande' => $request->Date_Demande,

        ];

        $demandes = Demande::create($data);

        return redirect()->route('RECOUPE.attente')
            ->with('success', 'Demande de Recoupe a été ajoutée avec Succes');
    }


    public function show_RECOUPE($id)
    {

        $demande = Demande::find($id);

        return view('demande.recoupe.show', compact('demande'));
    }


    public function edit_RECOUPE($id)
    {
        $demande = Demande::find($id);

        return view('demande.recoupe.edit', compact('demande'));
    }


    public function update_RECOUPE(Request $request, Demande $prv)
    {

        $prv->Commentaire_D = $request->commentaire_d;
        $prv->Date_Demande = $request->date;
        $prv->Degree_Reinclusion = $request->degree_reinclusion;
        $prv->Nombre_Recoupe = $request->nombre_recoupe;
        $prv->Type_Ref = $request->Type_Ref;
        $prv->update();

        return redirect()->route('M_Demandes')
            ->with('success', 'Recoupe modifiée avec succés');
    }


    public function destroy_RECOUPE(Demande $de)
    {
        $de->delete();
        return redirect()->route('M_Demandes')->with('deleted', 'Demande de Recoupe supprimee avec Succes');
    }

    public function search_r(Request $request)
    {

        $search_text = $_GET['query'];

        $bloc = Bloc::where('Reference_Bloc', 'LIKE', '%' . $search_text . '%')->first();

        $id = $bloc->id;

        $demandes = Demande::where('Id_Bloc', $id)->where('Type_D', 'Recoupe')->paginate(10);

        return view('demande.recoupe.search', compact('demandes'));
    }

    public function valide_RECOUPE()
    {
        
        $demandes = Demande::where('type_D', '=', 'Recoupe')->where('Status', '=' ,'Validée')->orderBy('id', 'desc')->paginate(10);
        return view('demande.recoupe.valide', compact('demandes'));
    


    }
    public function attente_RECOUPE()
    {
        $demandes = Demande::where('type_D', '=', 'Recoupe')->where('Status', '!=' ,'Validée')->orderBy('Id_User', 'asc')->paginate(10);
        return view('demande.recoupe.attente', compact('demandes'));


    }

    // COLORATION FUNCTIONS
    public function index_COLORATION()
    {
        $demandes = Demande::where('type_D', '=', 'coloration')->orderBy('id', 'desc')->paginate(10);
        return view('demande.coloration.index', compact('demandes'));
    }

    public function create_COLORATION()
    {
        return view('demande.coloration.create');
    }

    public function edit_COLORATION($id)
    {
        $demande = Demande::find($id);

        return view('demande.coloration.edit', compact('demande'));
    }

    public function store_COLORATION(Request $request)
    {
        $request->validate(
            [

                'Reference_Bloc' => 'required',
                'type_Coloration' => 'required',
                'Type_Ref'=>'required',
            ],
            [
                'Type_Ref.required' => 'Champ obligatoire ',

                'Reference_Bloc.required' => 'Veuillez saisir une référence',
                'type_Coloration.required' => 'Champ obligatoire',
            ],

        );
        $data = [

            'Reference_Bloc' => $request->Reference_Bloc,
            'Type_Ref'=>$request->Type_Ref,
            'Id_User' => auth()->user()->id,
            'Type_D' => 'Coloration',
            'Commentaire_D' => $request->commentaire_D,
            'Type_Coloration' =>implode(',', $request->type_Coloration),
            'Date_Demande' => $request->date,

        ];

        $demandes = Demande::create($data);

        return redirect()->route('COLORATION.attente')
            ->with('success', 'Demande de Coloration a été ajoutée avec Succes');
    }

    public function update_COLORATION(Request $request, Demande $prv)
    {

        $prv->Commentaire_D = $request->commentaire_d;
        $prv->Date_Demande = $request->date;
        $prv->Type_Ref = $request->Type_Ref;
        $prv->Type_Coloration = implode(',', $request->type_Coloration);

        $prv->update();

        return redirect()->route('M_Demandes')
            ->with('success', 'Coloration modifiée avec succés');
    }

    public function destroy_COLORATION(Demande $de)
    {
        $de->delete();
        return redirect()->route('M_Demandes')->with('deleted', 'Demande(s) de Coloration supprimée(s)');
    }

    public function show_COLORATION($id)
    {

        $demande = Demande::find($id);

        return view('demande.coloration.show', compact('demande'));
    }


    public function search_c(Request $request)
    {

        $search_text = $_GET['query'];

        $bloc = Bloc::where('Reference_Bloc', 'LIKE', '%' . $search_text . '%')->first();

        $id = $bloc->id;

        $demandes = Demande::where('Id_Bloc', $id)->where('Type_D', 'Coloration')->paginate(10);

        return view('demande.coloration.search', compact('demandes'));
    }
    public function attente_Coloration()
    {
        $demandes = Demande::where('type_D', '=', 'coloration')->where('Status', '!=' ,'Validée')->orderBy('Id_User', 'asc')->paginate(10);
        return view('demande.coloration.attente', compact('demandes'));

    }
    public function valide_Coloration()
    {
        $demandes = Demande::where('type_D', '=', 'coloration')->where('Status', '=' ,'Validée')->orderBy('id', 'desc')->paginate(10);
        return view('demande.coloration.valide', compact('demandes'));

    }

    //BIOMOL FUNCTIONS

    public function index_BIOMOL()
    {
        $demandes = Demande::where('type_D', '=', 'Biologie Moléculaire')->orderBy('id', 'desc')->paginate(10);
        return view('demande.BIOMOL.index', compact('demandes'));
    }

    public function create_BIOMOL()
    {
        return view('demande.BIOMOL.create');
    }

    public function edit_BIOMOL($id)
    {
        $demande = Demande::find($id);

        return view('demande.BIOMOL.edit', compact('demande'));
    }



    public function store_BIOMOL(Request $request)
    {
        $request->validate(
            [

                'Reference_Bloc' => 'required',
                'tests' => 'required',
                'Type_Ref'=>'required',
            ],
            [
                'Type_Ref.required' => 'Champ obligatoire ',
                'Reference_Bloc.required' => 'Veuillez saisir une référence',
                'tests.required' => 'Champ obligatoire',
            ],
        );
        $data = [

            'Reference_Bloc' => $request->Reference_Bloc,
            'Type_Ref'=>$request->Type_Ref,
            'Id_User' => auth()->user()->id,
            'Type_D' => 'Biologie Moléculaire',
            'Commentaire_D' => $request->commentaire_D,
            'tests' => implode(',', $request->tests),
            'Date_Demande' => $request->date,

        ];

        $demandes = Demande::create($data);

        return redirect()->route('BIOMOL.attente')
            ->with('success', 'Demande de BIOMOL a été ajoutée avec Succes');
    }

    public function update_BIOMOL(Request $request, Demande $prv)
    {

        $prv->Commentaire_D = $request->commentaire_d;
        $prv->Date_Demande = $request->date;
        $prv->Type_Ref = $request->Type_Ref;
        $prv->tests = implode(',', $request->tests);

        $prv->update();

        return redirect()->route('M_Demandes')
            ->with('success', ' Demande de BIOMOL modifiée avec succes');
    }

    public function destroy_BIOMOL(Demande $de)
    {
        $de->delete();
        return redirect()->route('M_Demandes')->with('deleted', 'Demande(s) de BIOMOL supprimée(s) avec Succes');
    }


    public function show_BIOMOL($id)
    {

        $demande = Demande::find($id);

        return view('demande.BIOMOL.show', compact('demande'));
    }


    public function search_BIOMOL(Request $request)
    {

        $search_text = $_GET['query'];

        $bloc = Bloc::where('Reference_Bloc', 'LIKE', '%' . $search_text . '%')->first();

        $id = $bloc->id;

        $demandes = Demande::where('Id_Bloc', $id)->where('Type_D', 'Biologie Moléculaire')->paginate(10);

        return view('demande.BIOMOL.search', compact('demandes'));
    }
    public function attente_BIOMOL()
    {
        $demandes = Demande::where('type_D', '=', 'Biologie Moléculaire')->where('Status', '!=' ,'Validée')->orderBy('Id_User', 'asc')->paginate(10);
        return view('demande.BIOMOL.attente', compact('demandes'));

    }
    public function valide_BIOMOL()
    {
        $demandes = Demande::where('type_D', '=', 'Biologie Moléculaire')->where('Status', '=' ,'Validée')->orderBy('id', 'desc')->paginate(10);
        return view('demande.BIOMOL.valide', compact('demandes'));

    }


    //IHC FUNCTIONS

    public function index_IHC()
    {
        $demandes = Demande::where('type_D', '=', 'IHC')->orderBy('id', 'desc')->paginate(10);

        return view('demande.IHC.index', compact('demandes'));
    }


    public function edit_IHC($id)
    {
        $demande = Demande::find($id);

        return view('demande.IHC.edit', compact('demande'));
    }

    public function show_IHC($id)
    {
        $demande = Demande::find($id);

        return view('demande.IHC.show', compact('demande'));
    }


    public function create_IHC()
    {
        return view('demande.IHC.create');
    }




    public function store_IHC(Request $request)
    {


        $request->validate(
            [
                'Reference_Bloc' => 'required',
                'panel_marquage' => 'required',
                'Type_Ref'=>'required',

            ],
            [
                'Reference_Bloc.required' => 'Veuillez selectionner une reference ',
                'panel_marquage.required' => 'Champ obligatoire',
                'Type_Ref.required' => 'Champ obligatoire'
            ]

        );

        $data = [

            'Reference_Bloc' => $request->Reference_Bloc,
            'Type_Ref' => $request->Type_Ref,
            'Id_User' => auth()->user()->id,
            'Type_D' => 'IHC',
            'Commentaire_D' => $request->commentaire_D,
            'Panel_Marquage' =>implode(',', $request->panel_marquage), 
           
            'Date_Demande' => $request->date,

        ];


        $demandes = Demande::create($data);



        return redirect()->route('IHC.attente')
            ->with('success', 'Demande  IHC a été ajoutée avec Succes');
    }

    public function deleteDemande(Request $request){

        $ids=$request->ids;
        Demande::whereIn('id',$ids)->delete();
       
        return redirect()->route('M_Demandes')->with('deleted', 'Demande(s)  supprimée(s) avec Succes');

    }

    public function update_IHC(Request $request, Demande $prv)
    {

        $prv->Commentaire_D = $request->commentaire_d;
        $prv->Date_Demande = $request->date;
        $prv->Type_Ref = $request->Type_Ref;
        $prv->Panel_Marquage = implode(',', $request->panel_marquage);
        $prv->update();

        return redirect()->route('M_Demandes')
        ->with('success', 'IHC modifie avec succes');
    }



    public function destroy_IHC(Demande $de)
    {
        $de->delete();
        return redirect()->route('M_Demandes')->with('deleted', 'Demande(s) IHC supprimée(s) avec Succes');
    }

    public function search_i(Request $request)
    {

        $search_text = $_GET['query'];

        $bloc = Bloc::where('Reference_Bloc', 'LIKE', '%' . $search_text . '%')->first();

        $id = $bloc->id;

        $demandes = Demande::where('Id_Bloc', $id)->where('Type_D', 'IHC')->paginate(10);

        return view('demande.IHC.search', compact('demandes'));
    }

    public function attente_IHC()
    {
        $demandes = Demande::where('type_D', '=', 'IHC')->where('Status', '!=' ,'Validée')->orderBy('Id_User', 'asc')->paginate(10);
        return view('demande.IHC.attente', compact('demandes'));

    }

    public function valide_IHC()
    {
        $demandes = Demande::where('type_D', '=', 'IHC')->where('Status', '=' ,'Validée')->orderBy('id', 'desc')->paginate(10);
        return view('demande.IHC.valide', compact('demandes'));

    }
}
