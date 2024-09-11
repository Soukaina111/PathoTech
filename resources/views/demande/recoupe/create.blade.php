@extends('adminlte::page')
@section('title', 'Ajouter Recoupe')
@section('content_header')
@stop
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div> Ajouter Recoupe</div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('RECOUPE.index') }}">Retour </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('RECOUPE.store') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label for="commentaire_D">Commentaire</label>
                                    <input type='text' class="form-control" id="commentaire_D" placeholder="commentaire"
                                        name="commentaire_D" value="{{old('commentaire_D')}}">
                                </div>
                                <div class="form-group">
                                    <label for="degree_reinclusion">Degré de Réinclusion</label>
                                    <input type='numeric' class="form-control" id="degree_reinclusion"
                                        placeholder="degree Reinclusion" name="degree_reinclusion" value="{{old('degree_reinclusion') }}">

                                    @if ($errors->any('degree_reinclusion'))
                                        <span class="text-danger">{{ $errors->first('degree_reinclusion') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nombre_recoupe ">Nombre Recoupe</label>
                                    <input type='numeric' class="form-control" id="nombre_recoupe"
                                        placeholder="Nombre Recoupe" name="nombre_recoupe"  value="1">

                                    @if ($errors->any('nombre_recoupe'))
                                        <span class="text-danger">{{ $errors->first('nombre_recoupe') }}</span>
                                    @endif
                                </div>
                                @php
                                    $today = date('Y-m-d');
                                @endphp
                                <div class="form-group pmd-textfield pmd-textfield-floating-label"
                                    data-provide="datepicker">
                                    <label class="control-label" for="dater">Select Date</label>
                                    <input type="date" class="form-control" id="datepicker" name="Date_Demande"
                                        value=@php
                                            echo $today;
                                        @endphp>
                                    <div class="            input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                        @if ($errors->any('Date_Demande'))
                                            <span class="text-danger">{{ $errors->first('Date_Demande') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit" method="post"> VALIDER</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
@endsection
@section('javascript')
    <script type="text/javascript">
        $("#Reference Bloc").select2({
            placeholder: "Selectionner une Reference",
            allowClear: true
        });
    </script>
@section('js')
@endsection
