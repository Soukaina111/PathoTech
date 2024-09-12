@extends('adminlte::page')
@section('title', 'Edit Coloration')
@section('content_header')
    <h1>Edit Coloration</h1>
@stop
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Data Table</title>
</head>
    <div class="container mt-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('M_Demandes') }}">Retour </a>
        </div>
        <form action="{{ route('COLORATION.update', $demande->id) }}" method="post">
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
                    <textarea class="form-control" name="commentaire_d">{{ $demande->Commentaire_D }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Type Coloration </label>
                <div class="col-sm-10">
                <select id="type_Coloration" class="form-control type_Coloration"  name="type_Coloration[]" multiple="multiple" style="width: 100%;" >
                    <option value="{{ $demande->Type_Coloration}}" selected style="display:none">{{ $demande->Type_Coloration}}</option>
                    {{-- <input class="form-control"  >  --}}
                    {{-- <datalist id="datalistOptions"  class="text-center"> --}}
                    <option value="TRICHROME">TRICHROME</option>
                    <option value="RETICULINE">RETICULINE</option>
                    <option value="PAS">PAS</option>
                    <option values="GROCOTT">GROCOTT</option>
                     <option value="PERLS">PERLS</option>
                            <option value="ROUGE CONGO">ROUGE CONGO</option>
                            <option value="ORCEINE">ORCEINE</option>
                            <option value="BLEU ALCIAN">BLEU ALCIAN</option>
                            <option value="GIEMSA MODIFIEE">GIEMSA MODIFIEE</option>
                            <option value="GIEMSA">GIEMSA</option>
                            <option value=" ZIEHL TUBERCULOSE">ZIEHL TUBERCULOSE</option>
                            <option value="ZIEHL LEPRE"> ZIEHL LEPRE</option>
                            <option value="FONTANA">FONTANA</option>
                            <option value="RETICULINE">RETICULINE</option>
                            <option value="GRAM">GRAM</option>
                            <option value="Autres">Autres</option>
                            
                </select>
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

@section('js')
<script>
    $(document).ready(function() {
        $('#type_Coloration').select2({
            theme: "classic"
            

        });
        
    });
</script>


     



@endsection
