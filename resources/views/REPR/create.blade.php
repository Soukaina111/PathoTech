@extends('adminlte::page')

@section('title', 'Ajouter Reprélèvement')

@section('content_header')




@stop



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div> Ajouter Prélèvement</div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('Repr.index') }}">Retour </a>
                            </div>


                        </div>
                        @php
                        $year = substr(date('y'), -2);
                        $na=$year .(idate('m'));
                        
                        @endphp

                        <div class="card-body">

                            <form action="{{ route('Repr.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  
                                        <label for="NumeroAnapath">Numéro Anapath</label>
                                        <input type="text"  name =" NumeroAnapath" class="form-control">
                                      
    
                                        @if ($errors->any('NumeroAnapath'))
                                            <span class="text-danger">{{ $errors->first('NumeroAnapath') }}</span>
                                        @endif
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
                                    <div class="            input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                        @if ($errors->any('date'))
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NombreBlocs">Nombre Blocs</label>
                                    <input type="text" class="form-control" id="NombreBlocs" placeholder="Nombre Blocs"
                                        name="NombreBlocs" value="{{ old('NombreBlocs') }}">
                                    @if ($errors->any('NombreBlocs'))
                                        <span class="text-danger">{{ $errors->first('NombreBlocs') }}</span>
                                    @endif
                                </div>

                                <button class="btn btn-primary" type="submit" method="post"> VALIDER</button>
                        </div>
                    </div>
                @endsection
               
