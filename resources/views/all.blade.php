@extends('adminlte::page')

@section('title', 'Prélèvements')

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

        .search-box i {
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }
    </style>
    <div class="container">
      
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div> 
                                <h2> Liste Des Prélèvements </h2>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6"> 
                                </div>
                                <div class="col-sm-6">
                                    <form class="search-box" method="GET" action="{{ route('Prelevement.search') }}">
                                        <i class="fa fa-search"></i>
                                        <input type="text" class="form-control" name="query"
                                            placeholder="Rechercher&hellip;">
                                        <button class="btn btn-primary" type="submit">Rechercher</button>
                                    </form>
                                </div>
                            </div>
                            @if (!$prelevements ->count())
                            <div class="alert alert-light" role="alert">
                                Aucun Résultat trouvé !
                          </div>
                          
                        





                          @else
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">N°Anapath</th>
                                        <th class="text-center">Médecin Manipulateur</th>
                                        <th class="text-center">Date Manipulation</th>
                                        <th class="text-center">Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prelevements as $pre)
                                        <tr>
                                            <td class="text-center">{{ $pre->NumeroAnapath }}</td>
                                            <td class="text-center">Dr. {{ $pre->user->name }}</td>
                                            <td class="text-center">{{date("d-m-Y", strtotime($pre->DateManipulation))}}</td>
                                            <td class="text-center">{{ $pre->Type }}</td>
                                        </tr>
                              
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center" >
                         
                                <button onclick="window.print()" class="hide-from-printer"  name="print">Imprimer</button>
                                <style>
                                    @media print {
      
                .hide-from-printer{  display:none; }
                .search-box{  display:none; }                           }
                            </style>
                            
                            </div>
                        </div>
                        <div class="card-footer">
                            
                            {{ $prelevements->links() }}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endsection
