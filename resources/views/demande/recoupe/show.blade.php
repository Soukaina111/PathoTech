@extends('adminlte::page')
@section('title', 'Détails Recoupe')
@section('content_header')
@stop
@section('content')
@section('content')
<html>
<br>
<body>
    <h1 class="text-center">Recoupe</h1>

    <div class="container mt-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('M_Demandes') }}">Retour </a>
        </div>
        
           
            <div class="row mb-3">
                <label for="numeroAnapath" class="col-sm-2 col-form-label">  Référence Bloc </label>
                <div class="col-sm-10"   >
                    <input type="text" id="ip1" class="form-control" id="numeroAnapath" 
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
                <label for="description" class="col-sm-2 col-form-label">Nombre Recoupe</label>
                <div class="col-sm-10">
                    <input  id="ip" type="numeric" class="form-control" name="nombre_recoupe" value="{{ $demande->Nombre_Recoupe }}" readonly>
                </div>
            </div>
          
            <div class="row mb-3">
                <label for="organe" class="col-sm-2 col-form-label">Commentaire</label>
                <div class="col-sm-10">
                    <textarea  id="ip" class="form-control" name="commentaire_d" style="height:50px" readonly>{{ $demande->Commentaire_D }}</textarea>
                </div>
            </div>
         
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Degré Réinclusion </label>
                <div class="col-sm-10">
                    <input  id="ip" type="numeric" class="form-control" name="degree_reinclusion" value="{{ $demande->Degree_Reinclusion }}" readonly>
                </div>
            </div>
        
            <div class="row mb-3" >
                <label for="description" class="col-sm-2 col-form-label">Date Demande </label>
                <div class="col-sm-10"  >
                    <input  id="ip" type="date"  class="form-control"   name="date" value="{{ $demande->Date_Demande }}" readonly>
                </div>
            </div>
           
    </div>

    {{-- <div style="page-break-after: always"></div> --}}
</body> 
    <div class="text-center" >
                         
        <button onclick="window.print()" class="hide-from-printer"  name="print">Imprimer</button>
        </html>
<style>
            @media print {
    
        #ip{border:none;
           
        }
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


