@extends('adminlte::page')

@section('title', 'Edit BIOMOL')

@section('content_header')

    <h1>Edit Biologie Moléculaire</h1>

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
        <form action="{{ route('BIOMOL.update', $demande->id) }}" method="post">
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
                <label for="tests" class="col-sm-2 col-form-label">Tests Moléculaire</label>
                <div class="col-sm-10">
                <select id="tests" class="form-control tests"  name="tests[]" multiple="multiple" style="width: 100%;" >
                    <option value="{{ $demande->tests}}" selected style="display:none">{{ $demande->tests}}</option>                   
                    <optgroup label="Tests-MUTATIONS"> 
                        <option value="MUTATION EGFR">MUTATION EGFR</option>
                        <option value="MUTATION KRAS">MUTATION KRAS</option>
                        <option value="MUTATION NRAS">MUTATION NRAS</option>
                        <option value="MUTATION BRAF V600E">MUTATION BRAF V600E</option>
                        
                    </optgroup>
                    <optgroup label=" Tests-FISH">
                        <option value="FISH HER2">FISH HER2</option>
                        <option value="FISH MDM2">FISH MDM2</option>
                        <option value="FISH NMYC">FISH NMYC</option>
                        <option value="FISH IP/19Q">FISH IP/19Q</option>
                        <option value="FISH EWSR1">FISH EWSR1</option>
                        <option value="FISH EBER">FISH EBER</option>
                        <option value="FISH BCL2">FISH BCL2</option>
                        <option value="FISH BCL6">FISH BCL6</option>
                    </optgroup>
                    <option value="Autres">Autres</option>
                    
                
            </select>
                {{-- <div class="col-sm-10">
                    <input type="text" class="form-control" name="tests" value="{{ $demande->tests}}">
                </div> --}}
            </div>
        </div>

            <div class="row mb-3">
                <label for="Commentaire" class="col-sm-2 col-form-label">Commentaire</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="commentaire_d">{{ $demande->Commentaire_D }}</textarea>
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
        $('#tests').select2({
            theme: "classic"
            

        });
        
    });
   
   

</script>


     



@endsection