
@extends('adminlte::page')


@section('title', 'Ajouter BIOMOL ')

@section('content_header')


@stop

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Data Table</title>
</head>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div> Ajouter BIOMOL</div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('BIOMOL.index') }}">Retour </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('BIOMOL.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group " width="100%">
                                    <label for="Reference_Bloc">Référence Bloc</label>
                                    <input type="text"  name =" Reference_Bloc" class="form-control">
                                    
                                    @if ($errors->any('Reference_Bloc'))
                                        <span class="text-danger">{{ $errors->first('Reference_Bloc') }}</span>
                                    @endif
                                </div>
                                <div class="form-group " width="100%">
                                    <label for="Type_Ref">Type</label>
                                    <select name="Type_Ref" id="Type_Ref"  style="width: 100%;">
                                        {{-- <option disabled selected value> </option> --}}
                                        <option style="display:none"></option>
                                        <option value="Biopsie Simple">Biopsie Simple</option>
                                        <option value="Bloc Communiqué">Bloc Communiqué</option>
                                        <option value="Piéce Opératoire">Piéce Opératoire</option>
                                        <option value="Suite d'Extp">Suite d'Extp</option>
                                        <option value="Extp">Extp</option>
                                    </select>
                                    @if ($errors->any('Type_Ref'))
                                        <span class="text-danger">{{ $errors->first('Type_Ref') }}</span>
                                    @endif

                                </div>
                                <div class="form-group"  >
                                    <label for="tests">Tests de Biologie Moléculaire</label>
                                     <select id="tests" class="form-control tests"  name="tests[]" multiple="multiple" style="width: 100%;" >
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

                                    @if ($errors->any('tests'))
                                        <span class="text-danger">{{ $errors->first('tests') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="commentaire_D">Commentaire</label>
                                    <textarea type='text' class="form-control" id="commentaire_D" placeholder="Comment"
                                        name="commentaire_D"></textarea>
                                </div>
                                @php
                                    $today = date('Y-m-d');
                                @endphp
                                <div class="form-group pmd-textfield pmd-textfield-floating-label"
                                data-provide="datepicker">
                                <label class="control-label" for="dater">Select Date</label>
                                <input type="date" class="form-control" id="datepicker" name="date"
                                    value=@php
                                        echo $today;
                                    @endphp>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                    @if ($errors->any('date'))
                                        <span class="text-danger">{{ $errors->first('date') }}</span>
                                    @endif
                                </div>
                            </div>


                              <div>
                                <button class="btn btn-primary" type="submit" method="post"> VALIDER</button>
                              </div>
                                
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
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