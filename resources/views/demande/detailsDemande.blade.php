@extends('adminlte::page')

@section('title', 'Demande Technique')

@section('content_header')

@section('content')
@section('content')
 
 <h3>{{ $demandes->Type_D }} </h3>
 <br>

<div>
    @if($demandes->Type_D=='Recoupe')
    <div class="container mt-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('M_Demandes') }}">Retour </a>
        </div>
            <div class="row mb-3">
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Référence Bloc</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="numeroAnapath"
                        value="{{ $demande->Reference_Bloc }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Médecin Demandant</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id=""
                        value="{{ $demande->user->name}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Nombre Recoupe</label>
                <div class="col-sm-10">
                    <input type="numeric" class="form-control" name="nombre_recoupe" value="{{ $demande->Nombre_Recoupe }}" readonly>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="organe" class="col-sm-2 col-form-label">Commentaire</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="commentaire_d" style="height:50px" readonly>{{ $demande->Commentaire_D }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Degrée Réinclusion </label>
                <div class="col-sm-10">
                    <input type="numeric" class="form-control" name="degree_reinclusion" value="{{ $demande->Degree_Reinclusion }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Date Demande </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="date" value="{{ $demande->Date_Demande }}" readonly>
                </div>
            </div>
    </div>
    @elseif($demandes->Type_D=='IHC')
    <div class="container mt-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('M_Demandes') }}">Retour </a>
        </div>
        <form action="{{ route('IHC.update', $demande->id) }}" method="post">
            {{ csrf_field() }}
            @method('PUT')
            <div class="row mb-3">
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Reference Bloc</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="numeroAnapath"
                        value="{{ $demande->Reference_Bloc }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Panel Marquage </label>
                <div class="col-sm-10">
                    <input class="form-control" name="Panel_marquage" value="{{ $demande->Panel_Marquage }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="organe" class="col-sm-2 col-form-label">Commentaire</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="commentaire_d" style="height:100px" disabled>{{ $demande->Commentaire_D }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Date Demande </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="date" value="{{ $demande->Date_Demande }}" disabled>
                </div>
            </div>
        </form>
    </div>
    @elseif($demandes>Type_D=='BIOMOL')

    <div class="row mb-3">
        <label for="numeroAnapath" class="col-sm-2 col-form-label">Référence Bloc</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="numeroAnapath"
                value="{{ $demande->Reference_Bloc }}" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label for="commentaire_d" class="col-sm-2 col-form-label">Commentaire</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="commentaire_d" disabled style="height:100px">{{ $demande->Commentaire_D }}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label for="tests" class="col-sm-2 col-form-label">Tests</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="tests" value="{{ $demande->tests }}" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label for="description" class="col-sm-2 col-form-label">Date Demande </label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="date" value="{{ $demande->Date_Demande }}" disabled>
        </div>
    </div>

   @elseif($demandes->Type=='Coloration')

   <div class="row mb-3">
    <label for="numeroAnapath" class="col-sm-2 col-form-label">Reference Bloc</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="numeroAnapath"
            value="{{ $demande->Reference_Bloc }}" disabled>
    </div>
</div>
<div class="row mb-3">
    <label for="organe" class="col-sm-2 col-form-label">Commentaire</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="commentaire_d" disabled style="height:100px">{{ $demande->Commentaire_D }}</textarea>
    </div>
</div>
<div class="row mb-3">
    <label for="description" class="col-sm-2 col-form-label">Type Coloration </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="type_coloration" value="{{ $demande->Type_Coloration }}" disabled>
    </div>
</div>
<div class="row mb-3">
    <label for="description" class="col-sm-2 col-form-label">Date Demande </label>
    <div class="col-sm-10">
        <input type="date" class="form-control" name="date" value="{{ $demande->Date_Demande }}" disabled>
    </div>
</div>
@endif


<div class="text-center" >
                         
    <button onclick="window.print()" class="hide-from-printer"  name="print">IMPRIMER</button>
    <style>
        @media print {
/* style sheet for print goes here */
.hide-from-printer{  display:none; }
                }
</style>
</div>

@endsection
