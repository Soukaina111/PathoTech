
@extends('adminlte::page')

@section('title', 'BIOMOL')

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
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
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
table.table tr th, table.table tr td {
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
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        @if (Auth::user()->role == 'Medecin')
                        <a href="{{ route('BIOMOL.create') }}" class="btn btn-outline-primary col-sm-4" role="button">Nouvelle Demande</a>
                        {{-- <a href="{{ route('BIOMOL.index') }}" class="btn btn-outline-secondary col-sm-3" role="button">Demandes Récentes</a> --}}
                        <a href="{{ route('BIOMOL.valide') }}" class="btn btn-outline-success col-sm-4" role="button">Demandes Validées</a>
                        <a href="{{ route('BIOMOL.attente') }}" class="btn btn-outline-danger col-sm-4" role="button">Demandes En Attente</a>
                        {{-- <div class="col-sm-6"><h2><b>RECOUPE</b></h2></div> --}}
                       @else
                       {{-- <a href="{{ route('BIOMOL.index') }}" class="btn btn-outline-secondary col-sm-4" role="button">Demandes Récentes</a> --}}
                        <a href="{{ route('BIOMOL.valide') }}" class="btn btn-outline-success col-sm-6" role="button">Demandes Validées</a>
                        <a href="{{ route('BIOMOL.attente') }}" class="btn btn-outline-danger col-sm-6" role="button">Demandes En Attente</a>
                       @endif
    
                            {{-- <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div> --}}
                        </div>
                    {{-- <div class="col-sm-6">
                        <button type="button" class="btn btn-success btn-xs">Add <span class="glyphicon glyphicon-plus"></span></button>
                         <button type="button" class="btn btn-default btn-sm">
                          <span class="glyphicon glyphicon-export"></span> Export
                        </button> --}}
                   
                    {{-- </div> --}}
                </div>
                <br>
                <br>
            <table class="table table-striped table-hover table-bordered">
             
                <thead>
                   
                    <tr>
                        {{-- @if ((Auth::user()->role == 'Medecin')) --}}
                        
                        <th>Référence Bloc</th>
                        <th>Type</th>
                        <th>Tests</th>
                        {{-- <th>Technicien Manipulateur</th>  --}}
                        <th>Date Demande</th>
                        <th>Commentaire</th>
                        {{-- <th>Nombre Recoupe</th>
                        <th>Degre Reinclusion</th>
                         --}}
                        {{-- <th>Recherche Position</i></th>
                        <th>Valider Technique</i></th> --}}
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demandes as $dem)
                    <tr>
                        <td><p class="font-weight-bold"> {{ $dem->Reference_Bloc ?? ' Reference introuvable' }}</p>
                        </td>
                        <td>{{ $dem->Type_Ref }}</td>
                        <td>{{ $dem->tests }}</td>
                        <td>{{date("d-m-Y", strtotime($dem->Date_Demande))}}</td>
                        <td>{{ $dem->Commentaire_D }}</td>
                        {{-- <td>{{ $dem->Degree_Reinclusion }}</td>
                         --}}
                        {{-- <td><button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter">
                          Accéder
                        </button> </td> --}}
                        {{-- <td> --}}
                        {{-- <div class="text-center">
                            <input type="checkbox" class="text-center" name="brand">
                          </div> --}}
                        {{-- </td> --}}
                        {{-- <td>
                            <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td> --}}
                     
                       


                    </tr>
                   
                    @endforeach       
                </tbody>
            </table>
           
        </div>
    </div>
    <div class="text-center" >
                         
        <button onclick="window.print()" class="hide-from-printer"  name="print">Imprimer</button>
        <style>
            @media print {
/* style sheet for print goes here */
.hide-from-printer{  display:none; }
.search-box{  display:none; }                           }
    </style>
       

    </div> 
    <div class="card-footer">
        {{ $demandes->links() }}
    </div> 
</div>   
</body>
</html>




@stop

