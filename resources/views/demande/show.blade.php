@extends('adminlte::page')
@section('title', 'Detail Piece Operatoire')
@section('content_header')
    <h1>Détails Recoupe</h1>
@stop

@section('content')
    <div class="container mt-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('RECOUPE.index') }}">Retour </a>
        </div>
        <form action="" method="put">
            <div class="row mb-3">
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Référence Bloc</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="numeroAnapath" value="{{ $demande->Id_Bloc }}"
                        disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="organe" class="col-sm-2 col-form-label">Commentaire</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="organe" disabled>{{ $demande->Commentaire_D }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Degrée réinclusion </label>
                <div class="col-sm-10">
                    <input type="numeric" class="form-control" id="description" disabled value="{{ $demande->Degree_Reinclusion }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Nombre Recoupe</label>
                <div class="col-sm-10">
                    <input type="numeric" class="form-control" id="description" disabled value="{{ $demande->Nombre_Recoupe }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Date Demande </label>
                <div class="col-sm-10">
                    <tinput type="date" class="form-control" id="description" disabled value="{{ $demande->Date_Demande }}">
                </div>
            </div>
            <div class="row mb-3">
                <table class="table table-striped">
                    {{-- <thead>
                        <tr>
                            <th>Siege<i class="fa fa-sort"></i></th>
                            <th>Nombre Fragments</th>
                            <th>Nombre Cassettes<i class="fa fa-sort"></i></th>
                            <th>Reste</th>
                            <th>Decals</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><input name=siege></th>
                            <th><input name=nbr_cassettes></th>
                            <th><input name=nbr_frag></th>
                            <th><input name=Reste></th>
                            <th><input name=decals></th>
                            <th><button type=submit><i class="fa fa-check-square" aria-hidden="true"></i></th>
                    </tbody> --}}
                </table>
            </div>
        </form>
    </div>

@endsection
