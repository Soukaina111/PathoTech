@extends('adminlte::page')
@section('title', 'Détails COLORATION SPECIALE')
@section('content_header')
@stop
@section('content')
@section('content')
<html>
<br>
<body>
    <h1 class="text-center">Coloration Spéciale</h1>

    <div class="container mt-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('M_Demandes') }}">Retour </a>
        </div>

            <div class="row mb-3">
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Référence Bloc</label>
                <div class="col-sm-10">
                    <input type="text"  id="ip1"class="form-control" id="numeroAnapath"
                        value="{{ $demande->Reference_Bloc }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="Type_Ref" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10"   >
                    <input type="text" id="ip" class="form-control" id="Type_Ref" 
                        value="{{ $demande->Type_Ref }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Médecin</label>
                <div class="col-sm-10">
                    <input type="text"  id="ip" class="form-control" id=""
                        value="{{ $demande->user->name}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Type Coloration </label>
                <div class="col-sm-10">
                    <input type="text" id="ip" class="form-control" name="type_coloration" value="{{ $demande->Type_Coloration }}" disabled>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="organe" class="col-sm-2 col-form-label">Commentaire</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="ip" name="commentaire_d" style="height:50px" readonly>{{ $demande->Commentaire_D }}</textarea>
                </div>
            </div>
            
            <div class="row mb-3" >
                <label for="description" class="col-sm-2 col-form-label">Date Demande </label>
                <div class="col-sm-10">
                    <input type="date"  id="ip" class="form-control" name="date" value="{{ $demande->Date_Demande }}" readonly>
                </div>
            </div>
    </div>
</html>
    {{-- <div style="page-break-after: always"></div> --}}
</body> 
    <div class="text-center" >
                         
        <button onclick="window.print()" class="hide-from-printer"  name="print">Imprimer</button>
<style>
            @media print {
                #ip{border:none;}
                #ip1{
            border:none;
            font-size: 1.30cm;
            text-align: center; 
             
            }
/* style sheet for print goes here */
    .hide-from-printer{  display:none; }
    .search-box{  display:none; }
    .btn{display:none; }  
   
html, body {
    height:100vh; 
      margin: 0 !important; 
      padding: 0 !important;
      
      /* overflow:hidden; */
    }

/* @page
{
    size: -1cm;
    height:auto;
    width:auto%;
    margin: 50%;
    
} */
/* @page{
    size:15cm;
  
} */
@page
{
    size:15cm;
    height:100vh;
    width:auto;
    margin: 0%;
    
}


}


    </style>
       
      

    </div>

@endsection


