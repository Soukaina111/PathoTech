@extends('adminlte::page')

@section('title', 'Edit Reprelevement')

@section('content_header')

    <h1>Détail Prélèvement</h1>

@stop
<style>
    #eye {
        color: blue;
    }

    #edit {
        color: green;
    }

    #trash {
        color: red;
    }
</style>

@section('content')
    <div class="container mt-5">
        <a class="btn btn-success" href="{{ route('Repr.index') }}">Retour </a>
        <form action="{{ route('Repr.update', $prelevement->id) }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="row mb-3">
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Numero Anapath</label>
                <div class="col-sm-10">
                    <input name="NumeroAnapath" type="text" class="form-control" id="numeroAnapath"
                        value="{{ $prelevement->NumeroAnapath }}" readonly>
                    @if ($errors->any('NumeroAnapath'))
                        <span class="text-danger">{{ $errors->first('NumeroAnapath') }}</span>
                    @endif
                </div>
            </div>
            {{-- <div class="row mb-3">
                <label for="organe" class="col-sm-2 col-form-label">Organe</label>
                <div class="col-sm-10">
                    <input name="organe" type="text" class="form-control" id="organe"
                        value="{{ $prelevement->Organe }}">
                    @if ($errors->any('organe'))
                        <span class="text-danger">{{ $errors->first('organe') }}</span>
                    @endif
                </div>
            </div> --}}
            {{-- <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    @if (Auth::user()->role == 'Medecin')
                    <textarea style="height:200px" name="Description" class="form-control" id="description">{{ $prelevement->Description }}</textarea>
                    @else
                    <textarea style="height:200px" name="Description" class="form-control" id="description" disabled>{{ $prelevement->Description }}</textarea>
                    @endif
                    @if ($errors->any('Description'))
                        <span class="text-danger">{{ $errors->first('Description') }}</span>
                    @endif
                </div>
            </div> --}}
            <div class="row mb-3">
                <label for="NombreBlocs" class="col-sm-2 col-form-label">Nombre de Blocs</label>
                <div class="col-sm-10">
                    <input name="NombreBlocs" type="text" class="form-control" id="NombreBlocs"
                        value="{{ $prelevement->NombreBlocs}}" >
                </div>
            </div>
            <div class="row mb-3">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>Référence Bloc</th>
                            {{-- <th>Nombre Cassetes</th> --}}
                            <th>Nombre Fragments</th>
                            <th>Siége</th>
                            <th>Décals</th>
                            <th class="hide-from-printer" >Action</th>
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
                                <th  class="hide-from-printer" >

                                    <a href="{{ route('Blocs.show', $bloc->id) }}" class="text-primary" title="View"
                                        data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                                        @if (Auth::user()->role == 'Medecin')
                                    <a href="{{ route('Blocs.edit', $bloc->id) }}" class="text-success" title="Edit"
                                        data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('Blocs.destroy', $bloc->id) }}" class="delete" title="Delete"
                                        data-toggle="tooltip"><i id="trash" class="fa fa-trash"></i></a>
                                        @endif

            
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary" type="submit" method="post"> Modifier </button>
        </form>
    </div>

@endsection
