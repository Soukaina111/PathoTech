<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Bloc;
use App\Models\Prelevement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;





class PrelevementsController extends Controller
{

    public function search(Request $request)
    {
        
        $search_text = $_GET['query'];
    $prelevements = Prelevement::with('user')
    ->join('users', 'prelevements.User_Id', 'users.id')
    ->where('users.name', 'like', "%{$search_text}%")
    ->orWhere('NumeroAnapath', 'LIKE', "%{$search_text}%")
     ->orWhere('Type', 'LIKE', "%{$search_text}%")->
      orWhere('DateManipulation', 'LIKE', '%' .date("Y-m-d", strtotime($search_text))  . '%')
    ->paginate(10)
        ->appends(request()->query());

        return view('all', compact('prelevements'));
        
       
    }


    public function all()
    {
        $prelevements = Prelevement::orderBy('id', 'desc')->paginate(10);

        return view('all', compact('prelevements'));
    }


    //Pieces Operatoires

    public function index()
    {
        $prelevements = Prelevement::where('Type', '=', 'Po')->where('DateManipulation' ,'=', Carbon::today())
        ->orderBy('id', 'desc')->paginate(10);

        return view('PO.index', compact('prelevements'));
    }

    public function create()
    {
        $data['services'] = Service::orderBy('id')->get();
        return view('PO.create', $data);
    }

    public function alpha1()
    {

        $list = [];
       
        $alpha = " A B C D E F G H I J K L M N O P Q R S T U V W X Y Z ";
        $alphar = explode(' ', $alpha);

        for ($i = 0; $i <= 26; $i++) {
            for ($j = 1; $j <= 26; $j++) {
                $list[] = $alphar[$i] . "" . $alphar[$j];
            }
        }
        return $list;
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'NumeroAnapath' => 'required|unique:Prelevements|max:255',
                //'Service' => 'required|max:255',
                //'organe' => 'required',
                //'date Manipulation' => 'required',
                'description' => 'required',
                'NombreBlocs' => 'required|max:255',

            ],
            [
                //'Service.required' => 'Please select a Service',
                //'organe.required' => 'Please enter at least one Organe',
                'description.required' => 'Veuillez Entrez la description Macroscopique',
            ]

        );

        $data = [
            'NumeroAnapath' => $request->NumeroAnapath,
           // 'Service_Id' => $request->Service,
            //'Organe' => $request->organe,
            'DateManipulation' => $request->date,
            'Type' => 'PO',
            'User_Id' => auth()->user()->id,
            'Description' => $request->description,
            'NombreBlocs' => $request->NombreBlocs,
        ];

        $prelevement = Prelevement::create($data);

        $id = DB::getPdo()->lastInsertId();

        for ($i = 0; $i < intval($request->NombreBlocs); $i++) {
            $reference = $request->NumeroAnapath .'-'. $this->alpha1()[$i];
            $data = [
                'Reference_Bloc' => $reference,
                'Prelevement_Id' => $id,
            ];
            $bl = Bloc::create($data);
        }

        return redirect()->route('Blocs.details', $id);
    }

    public function show($id)
    {
        $prelevement = Prelevement::find($id);

        return view('PO.show', compact('prelevement'));
    }


    public function edit($id)
    {
        $prelevement = Prelevement::find($id);

        return view('PO.edit', compact('prelevement'));
    }


    public function update(Request $request, Prelevement $prv)
    {

        $request->validate(
            [
                'Description' => 'required',
              
            ],
            [
               
                'Description.required' => 'Veuillez Entrez la description Macroscopique',
            ]

        );
        $prv->Description = $request->Description;
        $prv->NombreBlocs = $request->NombreBlocs;
       
        $h=$prv->getOriginal('NombreBlocs');
        $id = $prv->id;
        for ($i = $h; $i < intval($request->NombreBlocs); $i++) {
            $reference = $request->NumeroAnapath .'-'. $this->alpha1()[$i];
            $data = [
                'Reference_Bloc' => $reference,
                'Prelevement_Id' => $id,
            ];
            $bl = Bloc::create(($data));
        }
        $prv->update();
        return redirect()->route('Blocs.details', $id);

        
    }


    public function destroy(Prelevement $prv)
    {
        $prv->delete();
        return redirect()->route('PO.index')->with('deleted', 'Piece Operatoire supprimée avec Succès');
    }

    public function search_p(Request $request)
    {

        $search_text7 = $_GET['query'];

        $prelevements = Prelevement::where('NumeroAnapath','LIKE', "%{$search_text7}%")
        ->where('Type', 'PO')->paginate(10);

        return view('PO.index', compact('prelevements'));
        //new 
    //     $prelevements = Prelevement::with('user')
    // ->join('users', 'prelevements.User_Id', 'users.id')
    // ->where('users.name', 'like', "%{$search_text7}%")
    // ->orWhere('prelevements.NumeroAnapath', 'like', "%{$search_text7}%")
    //  ->orWhere('prelevements.Type', 'LIKE', "%{$search_text7}%")
    //   ->orWhere('prelevements.DateManipulation', 'LIKE', '%' .date("Y-m-d", strtotime($search_text7))  . '%')
    // ->paginate(10)
    //     ->appends(request()->query());

        // return view('PO.index', compact('prelevements'));

        //end

    }


   // Extemporanée
    
    public function index_extp()
    {
        $prelevements = Prelevement::where('type', '=', 'Extemporanée')->where('DateManipulation' ,'=', Carbon::today())
        ->orderBy('id', 'desc')->paginate(10);

        return view('Extp.index', compact('prelevements'));
    }


    public function create_extp()
    {
        $data['services'] = Service::orderBy('id')->get();
        return view('Extp.create', $data);
    }

    public function alpha3()
    {

        $list = [];
        // $alpha=" ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $alpha = " A B C D E F G H I J K L M N O P Q R S T U V W X Y Z ";
        $alphar = explode(' ', $alpha);

        for ($i = 0; $i <= 26; $i++) {
            for ($j = 1; $j <= 26; $j++) {
                $list[] = $alphar[$i] . "" . $alphar[$j];
            }
        }
        return $list;
    }

    public function store_extp(Request $request)
    {


        $request->validate(
            [
                'NumeroAnapath' => 'required|unique:Prelevements|max:255',
               // 'Service' => 'required|max:255',
                //'organe' => 'required',
                'date' => 'required',
                //'NombreBiopsie' => 'required',
                'description' => 'required',
                'NombreBlocs' => 'required|max:255',

            ],
            [
                //'Service.required' => 'Please select a Service',
                //'organe.required' => 'Please enter at least one Organe',
                'description.required' => 'Veuillez Entrez la description Macroscopique',
            ]

        );

        $data = [


            'NumeroAnapath' => $request->NumeroAnapath,
            //'Service_Id' => $request->Service,
            //'Organe' => $request->organe,
            'DateManipulation' => $request->date,
            'Type' => 'Extemporanée',
            'User_Id' => auth()->user()->id,
            'Description' => $request->description,
            'NombreBlocs' => $request->NombreBlocs,
            //'NombreBiopsie' => $request->NombreBiopsie,
        ];

        $prelevement = Prelevement::create($data);

        $id = DB::getPdo()->lastInsertId();

        for ($i = 0; $i < intval($request->NombreBlocs); $i++) {
            $reference = $request->NumeroAnapath .'-'. 'EXTP' . $i + 1;
            $data = [
                'Reference_Bloc' => $reference,
                'Prelevement_Id' => $id,
            ];
            $bl = Bloc::create($data);
        }

        return redirect()->route('Blocs.details', $id);

    }


    public function show_extp($id)
    {
        $prelevement = Prelevement::find($id);

        return view('Extp.show', compact('prelevement'));
    }


    public function edit_extp($id)
    {
        $prelevement = Prelevement::find($id);

        return view('Extp.edit', compact('prelevement'));
    }


    public function update_extp(Request $request, Prelevement $prv)
    {

        $request->validate(
            [
                //'organe' => 'required',
                'Description' => 'required',

            ],
            [
               // 'organe.required' => 'Enter au moins un  organe',
                'Description.required' => 'Veuillez Entrez la description Macroscopique',
            ]

        );

       //$prv->Organe = $request->organe;

        $prv->Description = $request->Description;


        
        $prv->NombreBlocs = $request->NombreBlocs;
       
        $h=$prv->getOriginal('NombreBlocs');
       
        $id = $prv->id;
        for ($i = $h; $i < intval($request->NombreBlocs); $i++) {
            $reference = $request->NumeroAnapath .'-'. 'EXTP' . $i + 1;
            $data = [
                'Reference_Bloc' => $reference,
                'Prelevement_Id' => $id,
            ];
            $bl = Bloc::create($data);
            
        }
       
        $prv->update();
        return redirect()->route('Blocs.details', $id);




        // return redirect()->route('Extp.index')
        //     ->with('success', 'Extemporanée modifie avec succes');
    }


    public function destroy_extp(Prelevement $prv)
    {
        $prv->delete();
        return redirect()->route('Extp.index')->with('deleted', 'Extemporanée supprimee avec Succes');
    }

    public function search_e(Request $request)
    {
        $search_text1 = $_GET['query'];
        $prelevements = Prelevement::where('NumeroAnapath','LIKE', "%{$search_text1}%")->where('Type', 'Extemporanée')
       ->paginate(10);
        return view('Extp.index', compact('prelevements'));

         
    }



        //Suite Extemporanée

        public function index_SE()
        {
            $prelevements = Prelevement::where('Type', '=', 'Suite Extemporanée')->where('DateManipulation' ,'=', Carbon::today())
            ->orderBy('id', 'desc')->paginate(10);
    
            return view('SE.index', compact('prelevements'));
        }
    
        public function create_SE()
        {
            $data['services'] = Service::orderBy('id')->get();
            return view('SE.create', $data);
        }
    
        public function alpha1_SE()
        {
    
            $list = [];
            // $alpha=" ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $alpha = " A B C D E F G H I J K L M N O P Q R S T U V W X Y Z ";
            $alphar = explode(' ', $alpha);
    
            for ($i = 0; $i <= 26; $i++) {
                for ($j = 1; $j <= 26; $j++) {
                    $list[] = $alphar[$i] . "" . $alphar[$j];
                }
            }
            return $list;
        }
    
        public function store_SE(Request $request)
        {
            $request->validate(
                [
                    'NumeroAnapath' => 'required|max:255',
                    //'Service' => 'required|max:255',
                    //'organe' => 'required',
                    //'date Manipulation' => 'required',
                    //'description' => 'required',
                    'NombreBlocs' => 'required|max:255',
    
                ],
                [
                    //'Service.required' => 'Please select a Service',
                    //'organe.required' => 'Please enter at least one Organe',
                    //'description.required' => 'Veuillez Entrez la description Macroscopique',
                ]
    
            );
    
            $data = [
                'NumeroAnapath' => $request->NumeroAnapath,
                //'Service_Id' => $request->Service,
                //'Organe' => $request->organe,
                'DateManipulation' => $request->date,
                'Type' => 'Suite Extemporanée',
                'User_Id' => auth()->user()->id,
                'Description' => $request->description,
                'NombreBlocs' => $request->NombreBlocs,
            ];
    
            $prelevement = Prelevement::create($data);
        
    
            $id = DB::getPdo()->lastInsertId();
    
            for ($i = 0; $i < intval($request->NombreBlocs); $i++) {
                $reference = $request->NumeroAnapath .'-'. $this->alpha1_SE()[$i];
                $data = [
                    'Reference_Bloc' => $reference,
                    'Prelevement_Id' => $id,
                ];
                $bl = Bloc::create($data);
            }
      
    
            return redirect()->route('Blocs.details', $id);
        }
    
        public function show_SE($id)
        {
            $prelevement = Prelevement::find($id);
    
            return view('SE.show', compact('prelevement'));
        }
    
    
        public function edit_SE($id)
        {
            $prelevement = Prelevement::find($id);
    
            return view('SE.edit', compact('prelevement'));
        }
    
    
        public function update_SE(Request $request, Prelevement $prv)
        {
    
            // $request->validate(
            //     [
            //        // 'organe' => 'required',
            //         //'Description' => 'required',
    
            //     ],
            //     [
            //        // 'organe.required' => 'Enter au moins un  organe',
            //       //  'Description.required' => 'Veuillez Entrez la description Macroscopique',
            //     ]
    
            // );
    
    
           // $prv->Organe = $request->organe;
    
            $prv->Description = $request->Description;
            $prv->NombreBlocs = $request->NombreBlocs;
       
            $h=$prv->getOriginal('NombreBlocs');
           
            $id = $prv->id;
            for ($i = $h; $i < intval($request->NombreBlocs); $i++) {
                $reference = $request->NumeroAnapath .'-'. $this->alpha1()[$i];
                $data = [
                    'Reference_Bloc' => $reference,
                    'Prelevement_Id' => $id,
                ];
                $bl = Bloc::create(($data));
                
            }
           
            $prv->update();
            return redirect()->route('Blocs.details', $id);
    
    
    
            return redirect()->route('SE.index')
                ->with('success', 'Piece Operatoire modifiée avec Succes');
        }
    
    
        public function destroy_SE(Prelevement $prv)
        {
            $prv->delete();
            return redirect()->route('SE.index')->with('deleted', 'Piece Operatoire supprimee avec Succes');
        }
    
        public function search_SE(Request $request)
        {
    
            $search_text2 = $_GET['query'];
            $prelevements = Prelevement::where('NumeroAnapath','LIKE', "%{$search_text2}%")->where('Type', 'Suite Extemporanée')
            ->paginate(10);
    
            $prelevements = Prelevement::where('NumeroAnapath', $search_text2)->where('Type', 'Suite Extemporanée')->paginate(10);
    
            return view('SE.index', compact('prelevements'));


            
        }
    





    // Reprélèvement

    public function index_repr()
    {
        $prelevements = Prelevement::where('type', '=', 'Reprélèvement')->where('DateManipulation' ,'=', Carbon::today())
        ->orderBy('id', 'desc')->paginate(10);

        return view('Repr.index', compact('prelevements'));
    }


    public function create_repr()
    {
    //    $data['services'] = Service::orderBy('id')->get();
        // $data1['prelevements'] = Prelevement::where('type', '=', 'Po')->orderBy('id')->get();
        return view('Repr.create');
    }

    public function alpha4()
    {

        $list = [];
        // $alpha=" ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $alpha = " A B C D E F G H I J K L M N O P Q R S T U V W X Y Z ";
        $alphar = explode(' ', $alpha);

        for ($i = 0; $i <= 26; $i++) {
            for ($j = 1; $j <= 26; $j++) {
                $list[] = $alphar[$i] . "" . $alphar[$j];
            }
        }
        return $list;
    }

    public function store_repr(Request $request)
    {

        $request->validate(
            [
                'NumeroAnapath' => 'required|max:255',
                //'Service' => 'required|max:255',
                //'organe' => 'required',
                'date' => 'required',
                //'description' => 'required',
                'NombreBlocs' => 'required|max:255',

            ],
            [
                'NumeroAnapath.required'=>'Veuillez entrez un Numero ANAPATH ',
                //'Service.required' => 'Please select a Service',
                //'organe.required' => 'Please enter at least one Organe',
               // 'description.required' => 'Veuillez Entrez la description Macroscopique',
            ]

        );

        $data = [


            'NumeroAnapath' => $request->NumeroAnapath,
            //'Service_Id' => $request->Service,
            //'Organe' => $request->organe,
            'DateManipulation' => $request->date,
            'User_Id' => auth()->user()->id,
            'Type' => 'Reprélèvement',
            //'Description' => $request->description,
            'NombreBlocs' => $request->NombreBlocs,
            //'NombreBiopsie' => $request->NombreBiopsie,
        ];
 

        $prelevement = Prelevement::create($data);
      

       $id = DB::getPdo()->lastInsertId();

        for ($i = 0; $i < intval($request->NombreBlocs); $i++) {
            $reference = $request->NumeroAnapath .'-'. 'R' . $i + 1;
            $data = [
                'Reference_Bloc' => $reference,
                'Prelevement_Id' => $id,
            ];
            $bl = Bloc::create($data);
        }

        return redirect()->route('Blocs.details', $id);

    }


    public function show_repr($id)
    {
        $prelevement = Prelevement::find($id);

        return view('Repr.show', compact('prelevement'));
    }


    public function edit_repr($id)
    {
        $prelevement = Prelevement::find($id);

        return view('Repr.edit', compact('prelevement'));
    }


    public function update_repr(Request $request, Prelevement $prv)
    {


        // $request->validate(
        //     [
        //        // 'organe' => 'required',
        //         'Description' => 'required',

        //     ],
        //     [
        //        // 'organe.required' => 'Enter au moins un  organe',
        //         'Description.required' => 'Veuillez Entrez la description Macroscopique',
        //     ]

        // );

       // $prv->Organe = $request->organe;

        //$prv->Description = $request->Description;
        $prv->NombreBlocs = $request->NombreBlocs;
        
        $h=$prv->getOriginal('NombreBlocs');
       
        $id = $prv->id;
        for ($i = $h; $i < intval($request->NombreBlocs); $i++) {
            $reference = $request->NumeroAnapath .'-'. 'R' . $i + 1;
            $data = [
                'Reference_Bloc' => $reference,
                'Prelevement_Id' => $id,
            ];
            $bl = Bloc::create($data);
        }
        $prv->update();
        return redirect()->route('Blocs.details', $id);




        // return redirect()->route('Repr.index')
        //     ->with('success', 'Reprélèvement modifié avec Succes');
    }

   
    public function destroy_repr(Prelevement $prv)
    {
        $prv->delete();
        return redirect()->route('Repr.index')->with('deleted', 'Reprélèvement supprimé avec Succes');
    }

    public function search_r(Request $request)
    {

        $search_text8 = $_GET['query'];

        $prelevements = Prelevement::where('NumeroAnapath','LIKE', "%{$search_text8}%")->where('Type', 'Reprélèvement')->paginate(10);

        return view('Repr.index', compact('prelevements'));
    }

 
    // Biopsie

    public function index_bio()
    {
        $prelevements = Prelevement::where('Type', '=', 'Biopsie')->where('DateManipulation' ,'=', Carbon::today())
        ->orderBy('id', 'desc')->paginate(10);

        return view('Bio.index', compact('prelevements'));
    }


    public function create_bio()
    {
        $data['services'] = Service::orderBy('id')->get();
        return view('bio.create', $data);
    }




    public function ToRomanNumeral($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }



    public function store_bio(Request $request)
    {

        $request->validate(
            [
                'NumeroAnapath' => 'required|unique:Prelevements|max:255',
                'Service' => 'required|max:255',
                'organe' => 'required',
                'date' => 'required',
                'NombreBiopsie' => 'required',
                'NombreBlocs' => 'required|max:255',
               

            ],
            [
                'Service.required' => 'Please select a Service',
                'organe.required' => 'Please enter at least one Organe',
            ]

        );


        $data = [


            'NumeroAnapath' => $request->NumeroAnapath,
            'Service_Id' => $request->Service,
            'Organe' => $request->organe,
            'DateManipulation' => $request->date,
            'Type' => 'Biopsie',
            'User_Id' => auth()->user()->id,
            'Description' => $request->description,
            'NombreBlocs' => $request->NombreBlocs,
            'NombreBiopsie' => $request->NombreBiopsie,
           
        ];


        $prelevement = Prelevement::create($data);

        $id = DB::getPdo()->lastInsertId();

        for ($i = 0; $i < intval($request->NombreBlocs); $i++) {
            if (intval($request->NombreBlocs) > intval($request->NombreBiopsie)) {
                $reference = $request->NumeroAnapath . $this->alpha1()[$i];
            } else {

                $reference = $request->NumeroAnapath . $this->ToRomanNumeral($i + 1);
            }
            $data = [
                'Reference_Bloc' => $reference,
                'Prelevement_Id' => $id,
            ];
            Bloc::create($data);
        }



        return redirect()->route('Blocs.details', $id);

    }


    public function show_bio($id)
    {
        $prelevement = Prelevement::find($id);

        return view('Bio.show', compact('prelevement'));
    }


    public function edit_bio($id)
    {
        $prelevement = Prelevement::find($id);

        return view('Bio.edit', compact('prelevement'));
    }


    public function update_bio(Request $request, Prelevement $prv)
    {

        $request->validate(
            [
                'NumeroAnapath' => 'required|unique:Prelevements|max:255',
                'organe' => 'required',
                'NombreBiopsie' => 'required',

            ],
            [
                'organe.required' => 'Enter au moins un  organe',
                'NombreBiopsie.required' => 'Veuillez Entrez la description Macroscopique',
            ]

        );

        $prv->NumeroAnapath = $request->NumeroAnapath;
        
        $prv->Organe = $request->organe;
        ;
        $prv->NombreBiopsie = $request->NombreBiopsie;


        $prv->update();



        return redirect()->route('Bio.index')
            ->with('success', 'Bio modifie avec succes');
    }

    

    public function destroy_bio(Prelevement $prv)
    {

        $prv->delete();
        return redirect()->route('Bio.index')->with('deleted', 'Biopsie supprimee avec Succes');
    }

    public function search_b(Request $request)
    {

        $search_text = $_GET['query'];

        $prelevements = Prelevement::where('NumeroAnapath', $search_text)->where('Type', 'Biopsie')->paginate(10);

        return view('Bio.index', compact('prelevements'));
    }




    //Bloc Communique

    public function index_BC()
    {
        $prelevements = Prelevement::where('Type', '=', 'BLOC COMMUNIQUE')->where('DateManipulation' ,'=', Carbon::today())
        ->orderBy('id', 'desc')->paginate(10);

        return view('BC.index', compact('prelevements'));
    }


    public function create_BC()
    {
        $data['services'] = Service::orderBy('id')->get();
        return view('BC.create', $data);
    }




    public function ToRomanNumeral_BC($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }



    public function store_BC(Request $request)
    {

        $request->validate(
            [
                'NumeroAnapath' => 'required|unique:Prelevements|max:255',
                'Service' => 'required|max:255',
                'organe' => 'required',
                'date' => 'required',
                'NombreBlocs' => 'required|max:255',

            ],
            [
                'Service.required' => 'Please select a Service',
                'organe.required' => 'Please enter at least one Organe',
            ]

        );


        $data = [

            'NumeroAnapath' => $request->NumeroAnapath,
            'Service_Id' => $request->Service,
            'Organe' => $request->organe,
            'DateManipulation' => $request->date,
            'Type' => 'BLOC COMMUNIQUE',
            'User_Id' => auth()->user()->id,
            'Description' => $request->description,
            'NombreBlocs' => $request->NombreBlocs,
         
        ];


        $prelevement = Prelevement::create($data);

        $id = DB::getPdo()->lastInsertId();

        for ($i = 0; $i < intval($request->NombreBlocs); $i++) {
            if (intval($request->NombreBlocs) > intval($request->NombreBiopsie)) {
                $reference = $request->NumeroAnapath . $this->alpha1()[$i];
            } else {

                $reference = $request->NumeroAnapath . $this->ToRomanNumeral($i + 1);
            }
            $data = [
                'Reference_Bloc' => $reference,
                'Prelevement_Id' => $id,
            ];
            Bloc::create($data);
        }



        return redirect()->route('Blocs.details', $id);

    }


    public function show_BC($id)
    {
        $prelevement = Prelevement::find($id);

        return view('BC.show', compact('prelevement'));
    }


    public function edit_BC($id)
    {
        $prelevement = Prelevement::find($id);

        return view('BC.edit', compact('prelevement'));
    }


    public function update_BC(Request $request, Prelevement $prv)
    {

        $request->validate(
            [
                'NumeroAnapath' => 'required|unique:Prelevements|max:255',
                'organe' => 'required',
                'NombreBiopsie' => 'required',

            ],
            [
                'organe.required' => 'Enter au moins un  organe',
                'NombreBiopsie.required' => 'Veuillez Entrez la description Macroscopique',
            ]

        );

        $prv->NumeroAnapath = $request->NumeroAnapath;
        
        $prv->Organe = $request->organe;
        ;
        $prv->NombreBiopsie = $request->NombreBiopsie;


        $prv->update();



        return redirect()->route('Bio.index')
            ->with('success', 'BLOC COMMUNIQUE modifie avec succes');
    }

    

    public function destroy_BC(Prelevement $prv)
    {

        $prv->delete();
        return redirect()->route('BC.index')->with('deleted', 'Biopsie supprimee avec Succes');
    }

    public function search_BC(Request $request)
    {

        $search_text = $_GET['query'];

        $prelevements = Prelevement::where('NumeroAnapath', $search_text)->where('Type', 'Biopsie')->paginate(10);

        return view('BC.index', compact('prelevements'));
    }




   /* public function postSignUp(Request $request)
    {
        $email = $request['email'];
        $first_name = $request['frist_name'];
        $password = bcrypt($request['password']);


        $user = new User();
        $user->email = $email;
        $user->frist_name = $first_name;
        $user->password = $password;

        $user->save();

        return redirect()->back();
    }
*/










}
