@extends('adminlte::page')

@section('title', 'Detail Reprelevement')

@section('content_header')

    <h1>Détails prélèvement</h1>

@stop

@section('content')
    <div class="container mt-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('Repr.index') }}">Retour </a>
        </div>
        <form action="" method="post">
            <div class="row mb-3">
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Numéro Anapath</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="numeroAnapath"
                        value="{{ $prelevement->NumeroAnapath }}" disabled>
                </div>
            </div>
            {{-- <div class="row mb-3">
                <label for="organe" class="col-sm-2 col-form-label">Organe</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="organe" value="{{ $prelevement->Organe }}" disabled>
                </div>
            </div> --}}
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea style="height:200px" class="form-control" id="description" disabled>{{ $prelevement->Description }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Référence Bloc</th>
                            {{-- <th>Nombres Cassettes</th> --}}
                            <th>Nombre Fragments</th>
                            <th>Siége</th>
                            <th>Decals</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prelevement->blocs as $bloc)
                            <tr>
                                <td>{{ $bloc->Reference_Bloc }}</td>
                                {{-- <td>{{ $bloc->Cassettes }}</td> --}}
                                <td>{{ $bloc->Fragments }}</td>
                                <td>{{ $bloc->Siege }}</td>
                                <td>{{ $bloc->Decals }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>

@endsection
