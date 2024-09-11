@extends('adminlte::page')

@section('title', 'Edit Recoupe')

@section('content_header')

    <h1>Edit Recoupe</h1>

@stop

@section('content')
    <div class="container mt-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('M_Demandes') }}">Retour </a>
        </div>
        <form action="{{ route('RECOUPE.update', $demande->id) }}" method="post">
            {{ csrf_field() }}
            @method('PUT')
            <div class="row mb-3">
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Référence Bloc</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="numeroAnapath"
                        value="{{ $demande->Reference_Bloc }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="Type_Ref" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                    <select name="Type_Ref" id="Type_Ref"  style="width: 100%;"  >
                        <option value="{{ $demande->Type_Ref}}" selected style="display:none">{{ $demande->Type_Ref}}</option>
                        <option value="Biopsie Simple">Biopsie Simple</option>
                        <option value="Bloc Communiqué">Bloc Communiqué</option>
                        <option value="Piéce Opératoire">Piéce Opératoire</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="organe" class="col-sm-2 col-form-label">Commentaire</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="commentaire_d" >{{ $demande->Commentaire_D }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Degré reinclusion </label>
                <div class="col-sm-10">
                    <input type="numeric" class="form-control" name="degree_reinclusion" value="{{ $demande->Degree_Reinclusion }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Nombre Recoupe</label>
                <div class="col-sm-10">
                    <input type="numeric" class="form-control" name="nombre_recoupe" value="{{ $demande->Nombre_Recoupe }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Date Demande </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="date" value="{{ $demande->Date_Demande }}">
                </div>
            </div>   
            <button class="btn btn-primary" type="submit" method="post"> Modifier </button>
        </form>
    </div>

@endsection
