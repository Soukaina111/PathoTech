@extends('adminlte::page')

@section('title', 'Mes demandes')

@section('content_header')



@stop

@section('content')
    <style>
        .search-box {
            position: relative;
            display: flex;
        }

        .search-box input {
            height: 34px;
            border-radius: 20px;
            padding-left: 35px;
            border-color: #ddd;
            box-shadow: none;
            margin-right: 10px;
        }

        .search-box input:focus {
            border-color: #3FBAE4;
        }
        .status {
                color: #ff0707;
                font-size: 18px;
            }

            .valide {
                color: #33cc33;
                font-size: 18px;
                
            }

        .search-box i {
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }

        #eye {
            color: blueviolet;
        }

        #edit {
            color: darkorange;
        }

        #trash {
            color: red;
        }
    </style>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('deleted'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2><b>Mes Demandes</b></h2>
                                </div>
                                @if (!$demandes ->count())
                            <div class="alert alert-light" role="alert">
                                Aucun Résultat trouvé !
                               </div>
                               @else
                                <div class="col-sm-6">
                                    <form class="search-box" method="GET" action="{{ route('demandes.search') }}">
                                        <i class="fa fa-search"></i>
                                        <input type="text" class="form-control" name="query"
                                            placeholder="Rechercher&hellip;">
                                        <button class="btn btn-primary" type="submit">Rechercher</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form action='/delete-demande' method="POST">
                            @csrf
                      
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th > 
                                        <input type="checkbox" id="checkAll"   >
                                    </th>
                                    {{-- <th class="text-center">#</th> --}}
                                    <th class="text-center">Type Demande</th>
                                    <th class="text-center">Référence Bloc </th>
                                  
                                    <th class="text-center">Date Demande</th>
                                    {{-- <th class="text-center">Nombre Recoupe</th> --}}
                                    {{-- <th class="text-center">Degrée Reinclusion</th> --}}
                                    <th class="text-center">Type Coloration</th>
                                    <th class="text-center">Liste Marqueurs</th>
                                    <th class="text-center">Tests BIOMOL</th>
                                    {{-- <th class="text-center">Commentaire</th> --}}
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandes as $dem)
                                    <tr>
                                        <form></form>
                    <th> 
                        <input type ="checkbox"  id="myDiv"  name="ids[]" class="checkboxclass"   value="{{$dem->id}}"/>
                         </th>
                                        {{-- <td class="text-center">{{ $dem->id }}</td> --}}
                                        <td class="text-center">{{ $dem->Type_D }}</td>
                                        <td class="text-center">
                                            {{ $dem->Reference_Bloc ?? ' Reference introuvable' }}
                                        </td>
                                        
                                        <td class="text-center">{{date("d-m-Y", strtotime($dem->Date_Demande))}}</td>
                                        {{-- <td class="text-center">{{ $dem->Nombre_Recoupe ?? '//' }} </td> --}}
                                        {{-- <td class="text-center">{{ $dem->Degree_Reinclusion ?? '//' }} </td> --}}
                                        <td class="text-center">{{ $dem->Type_Coloration ?? '//' }} </td>
                                        <td class="text-center">{{ $dem->Panel_Marquage ?? '//' }} </td>
                                        <td class="text-center">{{ $dem->tests?? '//' }} </td>
                                        {{-- <td class="text-center">{{ $dem->Commentaire_D }}</td> --}}
                                        @if ($dem->Status != 'Validée')
                                            <td class="status">{{ $dem->Status }}</td>
                                        @else
                                            <td class="valide">{{ $dem->Status }}</td>
                                        @endif
                                        @if ((Auth::user()->role == 'Technicien') & ($dem->Status != 'Validée'))
                                            <td>
                                                <a href="{{ route('M_show', $dem->id) }}" class="valide" title="View"
                                                    data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>

                                            </td>
                                        @elseif ((Auth::user()->role == 'Medecin') & ($dem->Status != 'Validée') & ($dem->Type_D == 'Coloration'))
                                            <td class="text-center">
                                                <a href="{{ route('COLORATION.show', $dem->id) }}" class="view"
                                                    title="View" data-toggle="tooltip"><i id="eye"
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('COLORATION.edit', $dem->id) }}" class="edit"
                                                    title="Edit" data-toggle="tooltip"><i id="edit"
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('COLORATION.destroy', $dem->id) }}" class="delete"
                                                    title="Delete" data-toggle="tooltip"><i id="trash"
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                            @elseif ((Auth::user()->role == 'Medecin') & ($dem->Status != 'Validée') & ($dem->Type_D == 'Biologie Moléculaire'))
                                            <td class="text-center">
                                                <a href="{{ route('BIOMOL.show', $dem->id) }}" class="view"
                                                    title="View" data-toggle="tooltip"><i id="eye"
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('BIOMOL.edit', $dem->id) }}" class="edit"
                                                    title="Edit" data-toggle="tooltip"><i id="edit"
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('BIOMOL.destroy', $dem->id) }}" class="delete"
                                                    title="Delete" data-toggle="tooltip"><i id="trash"
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        @elseif ((Auth::user()->role == 'Medecin') & ($dem->Status != 'Validée') & ($dem->Type_D == 'Recoupe'))
                                            <td class="text-center">
                                                <a href="{{ route('RECOUPE.show', $dem->id) }}" class="view"
                                                    title="View" data-toggle="tooltip"><i id="eye"
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('RECOUPE.edit', $dem->id) }}" class="edit"
                                                    title="Edit" data-toggle="tooltip"><i id="edit"
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('RECOUPE.destroy', $dem->id) }}" class="delete"
                                                    title="Delete" data-toggle="tooltip"><i id="trash"
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        @elseif ((Auth::user()->role == 'Medecin') & ($dem->Status != 'Validée') & ($dem->Type_D == 'IHC'))
                                            <td class="text-center">
                                                <a href="{{ route('IHC.show', $dem->id) }}" class="view" title="View"
                                                    data-toggle="tooltip"><i id="eye" class="fa fa-eye"></i></a>
                                                <a href="{{ route('IHC.edit', $dem->id) }}" class="edit" title="Edit"
                                                    data-toggle="tooltip"><i id="edit" class="fa fa-edit"></i></a>
                                                <a href="{{ route('IHC.destroy', $dem->id) }}" class="delete"
                                                    title="Delete" data-toggle="tooltip"><i id="trash"
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <a href="{{ route('demandes.destroy', $dem->id) }}" class="delete"
                                                    title="Delete" data-toggle="tooltip"><i id="trash"
                                                        class="fa fa-trash"></i></a>
                                                </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                        <input type="submit" value="Supprimer Les Demandes Selectionnées">
                    </form> 
                    </div>
                    <div class="card-footer">
                        {{ $demandes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</form> 
@endif
@endsection
@section('js')
<script type="text/javascript">
  $(function (e) {
    $("#checkAll").click(function(){
        $(".checkboxclass").prop('checked',$(this).prop('checked'));
    });
}); 




</script>
@endsection
