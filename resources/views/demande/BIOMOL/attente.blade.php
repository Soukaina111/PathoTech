<!-- index.html -->


@extends('adminlte::page')

@section('title', 'BIOMOL')

@section('content_header')

@stop

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}    
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    @if (Auth::user()->role == 'Medecin')
                    <a href="{{ route('BIOMOL.create') }}" class="btn btn-outline-primary col-sm-4" role="button">Nouvelle Demande</a>
                    <a href="{{ route('BIOMOL.valide') }}" class="btn btn-outline-success col-sm-4" role="button">Demandes Validées</a>
                    <a href="{{ route('BIOMOL.attente') }}" class="btn btn-outline-danger col-sm-4" role="button">Demandes En Attente</a>
                   @else
                    <a href="{{ route('BIOMOL.valide') }}" class="btn btn-outline-success col-sm-6" role="button">Demandes Validées</a>
                    <a href="{{ route('BIOMOL.attente') }}" class="btn btn-outline-danger col-sm-6" role="button">Demandes En Attente</a>
                   @endif
                    </div>
            </div>
            <br>
            <br>
           
<form action='/valider-blocs' method="POST">
               @csrf
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        @if ((Auth::user()->role != 'Medecin'))

                        <th > 
                            <input type="checkbox" id="checkAll" class="fa fa-check" aria-hidden="true"  >
                        </th>
                        @endif
                        <th>Référence Bloc </th>
                        <th>Type</th>
                        <th>Médecin Demandant</th>
                        <th>Tests</th>
                        <th>Date Demande</th>
                        <th>Commentaire</th> 
                        @if ((Auth::user()->role == 'Technicien'))
                        <th>Action</th>
                        <th > 
                            <input type="checkbox" id="checkAll1" class="fa fa-print" aria-hidden="false"  >
                            
                        </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demandes as $dem)
                    <tr>
                        <form></form>
                    @if ((Auth::user()->role != 'Medecin'))

                        <th> 

                            <input type ="checkbox"  id="myDiv"  name="ids[]" class="checkboxclass"   value="{{($dem->id)}}" />

                             </th>
                    @endif
                       
                    <td><p class="font-weight-bold"> {{ $dem->Reference_Bloc ?? ' Reference introuvable' }}</p>
                        </td>
                        <td>{{ $dem->Type_Ref }}</td>
                        <td>Dr.{{ $dem->user->name }}</td>
                        <td>{{ $dem->tests }}</td>
                        <td>{{date("d-m-Y", strtotime($dem->Date_Demande))}}</td>
                        <td>{{ $dem->Commentaire_D }}</td>
                        @if ((Auth::user()->role != 'Medecin'))
                        <td class="text-center">
                            <div class="text-center">
                                <form action="{{ route('status.update', $dem->id) }}" method="put"
                                    title="Valider" data-toggle="tooltip"><button class="btn btn-success"
                                        type="submit">Valider</button>
                                </form>
                            </div>
                        </td>
                        @endif
                        <th>
                            @if ((Auth::user()->role != 'Medecin'))
                            <input type ="checkbox"  id="myDiv"  name="ids[]"  value="{{route('BIOMOL.show', $dem->id)}}" class="checkboxclass1"  aria-hidden="false"  />
                            @endif
                        </th>

                    </tr>
                   
                    @endforeach       
                </tbody>
            </table>

            @if ((Auth::user()->role != 'Medecin'))
            <input type="submit"  class="hide-from-printer" value="Valider">
            @endif 
</form>

        </div>
        @if ((Auth::user()->role != 'Medecin'))
        <button onclick="printChecked()" >Imprimer</button> 
        @endif
    </div>
    <div class="card-footer">
        {{ $demandes->links() }}
    </div> 
</div> 
</body>
</html>
@section('js')
<iframe id="print-area" style="display: none;" ></iframe>
<script type="text/javascript">
  $(function (e) {
    $("#checkAll").click(function(){
        $(".checkboxclass").prop('checked',$(this).prop('checked'));
    });
}); 
$(function (e) {
    $("#checkAll1").click(function(){
        $(".checkboxclass1").prop('checked',$(this).prop('checked'));
    });
}); 

function printChecked() {
        let checked = document.querySelectorAll('form input:checked');
            document.getElementById('print-area').src = '';
    
        for (let i = 0; i < checked.length; i++) {
            let url = checked[i].value;
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('print-area').srcdoc += this.responseText;
                }
            };
            xhr.open('GET', url, true);
            xhr.send();
        }      
        document.getElementById('print-area').contentWindow.print();
              
    }

</script>
@endsection
@stop































{{-- <style>
    #print-area {
        page-break-before: always;
    }
    </style>
    <style>
        @page {
  size: 8.5in 11in; /* Set the size of the page */
  margin: 0.5in; /* Set the margins around the content */
}

#print-area {
  page-break-before: always; /* Always start a new page before the print area */
  page-break-after: always; /* Always end the current page after the print area */
  page-break-inside: avoid; /* Avoid page breaks within the print area */
}
    </style> --}}












































