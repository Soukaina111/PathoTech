@extends('adminlte::page')

@section('title', 'Coloration')

@section('content_header')




@stop





@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Bootstrap Simple Data Table</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style>
            body {
                color: #566787;
                background: #f5f5f5;
                font-family: 'Roboto', sans-serif;
            }

            .status {
                color: #FFC107;
                font-size: 18px;
            }

            .valide {
                color: #33cc33;
                font-size: 18px;
            }

            .table-responsive {
                margin: 30px 0;
            }

            .table-wrapper {
                min-width: 1000px;
                background: #fff;
                padding: 20px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            }

            .table-title {
                padding-bottom: 10px;
                margin: 0 0 10px;
                min-width: 100%;
            }

            .table-title h2 {
                margin: 8px 0 0;
                font-size: 22px;
            }

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


            .search-box {
                position: relative;
                float: right;
            }

            .search-box input {
                height: 34px;
                border-radius: 20px;
                padding-left: 35px;
                border-color: #ddd;
                box-shadow: none;
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

            table.table tr th,
            table.table tr td {
                border-color: #e9e9e9;
            }

            table.table-striped tbody tr:nth-of-type(odd) {
                background-color: #fcfcfc;
            }

            table.table-striped.table-hover tbody tr:hover {
                background: #f5f5f5;
            }

            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }

            table.table td:last-child {
                width: 130px;
            }

            table.table td a {
                color: #a0a5b1;
                display: inline-block;
                margin: 0 5px;
            }

            table.table td a.view {
                color: #03A9F4;
            }

            table.table td a.edit {
                color: #FFC107;
            }

            table.table td a.delete {
                color: #E34724;
            }

            table.table td i {
                font-size: 19px;
            }

            .pagination {
                float: right;
                margin: 0 0 5px;
            }

            .pagination li a {
                border: none;
                font-size: 95%;
                width: 30px;
                height: 30px;
                color: #999;
                margin: 0 2px;
                line-height: 30px;
                border-radius: 30px !important;
                text-align: center;
                padding: 0;
            }

            .pagination li a:hover {
                color: #666;
            }

            .pagination li.active a {
                background: #03A9F4;
            }

            .pagination li.active a:hover {
                background: #0397d6;
            }

            .pagination li.disabled i {
                color: #ccc;
            }

            .pagination li i {
                font-size: 16px;
                padding-top: 6px
            }

            .hint-text {
                float: left;
                margin-top: 6px;
                font-size: 95%;
            }
        </style>
        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>

    <body>
        <div class="container-xl">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @elseif ($message = Session::get('deleted'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2><b>Coloration</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <form class="search-box" method="GET" action="{{ route('demandes.search_c') }}">
                                    <i class="fa fa-search"></i>
                                    <input type="text" class="form-control" name="query" placeholder="Search&hellip;">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Reference Bloc </th>
                                    <th class="text-center">Medecin Demandant</th>
                                    <th class="text-center">Date Demande</th>
                                    <th class="text-center">Nombre Recoupe</th>
                                    <th class="text-center">Degrée Reinclusion</th>
                                    <th class="text-center">Type Coloration</th>
                                    <th class="text-center">Panel Marquage</th>
                                    <th class="text-center">Commentaire</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @foreach ($demandes as $dem)
                                    <tr>
                                        <td class="text-center">{{ $dem->Type_D }}</td>
                                        <td class="text-center">
                                            {{ $dem->Reference_Bloc ?? ' Reference introuvable' }}
                                        </td>
                                        <td class="text-center">Dr.{{ $dem->user->name }}</td>
                                        <td class="text-center">{{date("d-m-Y", strtotime($dem->Date_Demande))}}</td>
                                        <td class="text-center">{{ $dem->Nombre_Recoupe ?? '//' }} </td>
                                        <td class="text-center">{{ $dem->Degree_Reinclusion ?? '//' }} </td>
                                        <td class="text-center">{{ $dem->Type_Coloration ?? '//' }} </td>
                                        <td class="text-center">{{ $dem->Panel_Marquage ?? '//' }} </td>
                                        <td class="text-center">{{ $dem->Commentaire_D }}</td>
                                        @if ($dem->Status != 'Validee')
                                            <td class="status">{{ $dem->Status }}</td>
                                        @else
                                            <td class="valide">{{ $dem->Status }}</td>
                                        @endif
                                        @if ((Auth::user()->role == 'Technicien') & ($dem->Status != 'Validee'))
                                            <td>
                                                <a href="{{ route('M_show', $dem->id) }}" class="valide" title="View"
                                                    data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>

                                            </td>
                                        @elseif ((Auth::user()->role == 'Medecin' || 'Admin') & ($dem->Status != 'Validee') & ($dem->Type_D == 'Coloration'))
                                            <td class="text-center">
                                                <a href="{{ route('COLORATION.show', $dem->id) }}" class="view"
                                                    title="View" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE417;</i></a>
                                                <a href="{{ route('COLORATION.edit', $dem->id) }}" class="edit"
                                                    title="Edit" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE254;</i></a>
                                                <a href="{{ route('COLORATION.destroy', $dem->id) }}" class="delete"
                                                    title="Delete" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE872;</i></a>
                                            </td>
                                        @elseif ((Auth::user()->role == 'Medecin' || 'Admin') & ($dem->Status != 'Validee') & ($dem->Type_D == 'Recoupe'))
                                            <td class="text-center">
                                                <a href="{{ route('RECOUPE.show', $dem->id) }}" class="view"
                                                    title="View" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE417;</i></a>
                                                <a href="{{ route('RECOUPE.edit', $dem->id) }}" class="edit"
                                                    title="Edit" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE254;</i></a>
                                                <a href="{{ route('RECOUPE.destroy', $dem->id) }}" class="delete"
                                                    title="Delete" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE872;</i></a>
                                            </td>
                                        @elseif ((Auth::user()->role == 'Medecin' || 'Admin') & ($dem->Status != 'Validee') & ($dem->Type_D == 'IHC'))
                                            <td class="text-center">
                                                <a href="{{ route('IHC.show', $dem->id) }}" class="view" title="View"
                                                    data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                                <a href="{{ route('IHC.edit', $dem->id) }}" class="edit" title="Edit"
                                                    data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                <a href="{{ route('IHC.destroy', $dem->id) }}" class="delete"
                                                    title="Delete" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE872;</i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
    </body>
    <div class="card-footer">
        {{ $demandes->links() }}
    </div>

    </html>




@stop
