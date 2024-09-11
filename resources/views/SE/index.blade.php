@extends('adminlte::page')

@section('title', 'Suite Extemporanée')

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
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                        <div> </div>
                            @if (Auth::user()->role == 'Medecin')
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('SE.create') }}"> Ajouter Prélèvement</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Demandes du Jour /<a href="{{ route('SE.index') }}">Suite Extemporanée</a></h5>
                                </div>
                                <div class="col-sm-6">
                                    <form class="search-box" method="GET" action="{{ route('SE.search') }}">
                                        <i class="fa fa-search"></i>
                                        <input type="text" class="form-control" name="query"
                                            placeholder="Rechercher&hellip;">
                                        <button class="btn btn-primary" type="submit">Rechercher</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">N°Anapath</th>
                                    <th class="text-center">Médecin Manipulateur</th>
                                    <th class="text-center">Date Manipulation</th>
                                    @if (Auth::user()->role == 'Medecin')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prelevements as $pre)
                                    <tr>
                                        <td class="text-center">{{ $pre->NumeroAnapath }}</td>
                                        <td class="text-center">Dr.{{ $pre->user->name }}</td>
                                        <td class="text-center">{{date("d-m-Y", strtotime($pre->DateManipulation))}}</td>
                                        @if (Auth::user()->role == 'Medecin')
                                            <td>
                                                <a href="{{ route('Blocs.details', $pre->id) }}" class="text-primary"
                                                    title="View" data-toggle="tooltip"><i id="eye" class="fa fa-eye"></i></a>
                                                <a href="{{ route('SE.edit', $pre->id) }}" class="text-success"
                                                    title="Edit" data-toggle="tooltip"><i id="edit" class="fa fa-edit"></i></a>
                                                <a href="{{ route('SE.destroy', $pre->id) }}" class="delete"
                                                    title="Delete" data-toggle="tooltip"><i id="trash"
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $prelevements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
