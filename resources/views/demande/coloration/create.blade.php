@extends('adminlte::page')
@section('title', 'Ajouter COLORATION ')
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
                            <div> Ajouter Coloration Spéciale</div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('COLORATION.index') }}">Retour </a>
                            </div>


                        </div>

                        <div class="card-body">

                            <form action="{{ route('COLORATION.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="type_Coloration">Type Coloration</label>
                                    {{-- <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;"> --}}
                                     <select id="type_Coloration" class="form-control type_Coloration"  name="type_Coloration[]" multiple="multiple" style="width: 100%;" >
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

                                   

                                    @if ($errors->any('type_Coloration'))
                                        <span class="text-danger">{{ $errors->first('type_Coloration') }}</span>
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
        $('#type_Coloration').select2({
            theme: "classic"
            

        });
        
    });
   
   

</script>


     



@endsection