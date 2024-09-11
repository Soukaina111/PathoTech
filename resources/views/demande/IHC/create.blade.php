

@extends('adminlte::page')



@section('title', 'Ajouter IHC')

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
                            <div> Ajouter IHC</div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('IHC.index') }}">Retour </a>
                            </div>


                        </div>

                        <div class="card-body">

                            <form action="{{ route('IHC.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="panel_marquage">Panel Marquage</label>
                                     <select id="panel" class="form-control panel"  name="panel_marquage[]" multiple="multiple" style="width: 100%;" >
                                        <option value="ACE">ACE</option>
                                        <option value="actine muscle lisse">actine muscle lisse</option>
                                        <option value="ALK"> ALK</option>
                                        <option values="alpha-foeto-proteine"> alpha-foeto-proteine</option>
                                         <option value="alpha-inhibine">alpha-inhibine</option>
                                                <option value="AMACR"> AMACR</option>
                                                <option value="antigène carcinoembryonaire"> antigène carcinoembryonaire</option>
                                                <option value="anti-Hairy Cell Leukemia antibody"> anti-Hairy Cell Leukemia antibody</option>
                                                <option value="Anti-hépatocyte">Anti-hépatocyte</option>
                                                <option value="ATRX"> ATRX</option>
                                                <option value=" BCL-2"> BCL-2</option>
                                                <option value="BCL-6"> BCL-6</option>
                                                <option value="bêta-Caténine">bêta-Caténine</option>
                                                <option value="bêta-HCG">bêta-HCG</option>
                                                <option value="CD1a"> CD1a</option>
                                                <option value="CD3">CD3</option>
                                                <option value="CD4">CD4</option>
                                                <option value="CD4d">CD4d</option>
                                                <option value="CD5">CD5</option>
                                                <option value="CD7">CD7</option>
                                                <option value="CD8">CD8</option>
                                                <option value="CD10">CD10</option>
                                                <option value="CD15">CD15</option>
                                                <option value="CD20">CD20</option>
                                                <option value="CD21">CD21</option>
                                                <option value="CD23">CD23</option>
                                                <option value="CD30">CD30</option>
                                                <option value="CD31">CD31</option>
                                                <option value="CD34">CD34</option>
                                                <option value="CD43">CD43</option>
                                                <option value="CD45">CD45</option>
                                                <option value="CD56">CD56</option>
                                                <option value="CD68">CD68</option>
                                                <option value="CD79a">CD79a</option>
                                                <option value="CD138">CD138</option>
                                                <option value=" CD99"> CD99</option>
                                                <option value="CD117">CD117</option>
                                                <option value="CDX2">CDX2</option>
                                                <option value="calcitonine">calcitonine</option>
                                                <option value="caldesmose">caldesmose</option>
                                                <option value="calrétinine">calrétinine</option>
                                                <option value="chromogranine A">chromogranine A</option>
                                                <option value="cycline D1">cycline D1</option>
                                                <option value="chaîne légère Kappa">chaîne légère Kappa</option>
                                                <option value="chaîne légère Lambda">chaîne légère Lambda</option>
                                                <option value="">cytokératine AE1/AE3</option>
                                                <option value="cytokératine 5/6">cytokératine 5/6</option>
                                                <option value="cytokératine 7">cytokératine 7</option>
                                                <option value="cytokératine 19">cytokératine 19</option>
                                                <option value="cytokératine 20">cytokératine 20</option>
                                                <option value="desmine">desmine</option>
                                                <option value="DOG 1">DOG 1</option>
                                                <option value="">E-cadhérine</option>
                                                <option value="  EMA">EMA</option>
                                                <option value="GCDFP15">GCDFP15</option> 
                                                <option value=" P-S100">P-S100</option>
                                                <option value=" GAB1"> GAB1</option>
                                                <option value="GATA 3">GATA 3</option>
                                                <option value="GFAP">GFAP</option>
                                                <option value=" Granzyme B"> Granzyme B</option>
                                                <option value="HMB 45">HMB 45</option>
                                                <option value="HHV8">HHV8</option>
                                                <option value="IDH1 R132H">IDH1 R132H</option>
                                                <option value="INI1">INI1</option>
                                                <option value="inhibine">inhibine</option>
                                                <option value="Ki-67">Ki-67</option>
                                                <option value="LMP1">LMP1</option>
                                                <option value="lymphocytes B">lymphocytes B</option>
                                                <option value="mammaglobine">mammaglobine</option>
                                                <option value="MDM2">MDM2</option>
                                                <option value="melan A">melan A</option>
                                                <option value="myéloperoxydase">myéloperoxydase</option>
                                                <option value="myogénine">myogénine</option>
                                                <option value="MUC-2">MUC-2</option>
                                                <option value="MUC5AC">MUC5AC</option>
                                                <option value="MUM 1">MUM 1</option>
                                                <option value="napsine A">napsine A</option>
                                                <option value="Neu-N">Neu-N</option>
                                                <option value="neurofilament">neurofilament</option>
                                                <option value="NSE">NSE</option>
                                                <option value="Olig2">Olig2</option>
                                                <option value="Oct-3/4">Oct-3/4</option>
                                                <option value="PAX5">PAX5</option>
                                                <option value="p40">p40</option>
                                                <option value="p53">p53</option>
                                                <option value="p63">p63</option>
                                                <option value="PLAP">PLAP</option>
                                                <option value="PD-L1">PD-L1</option>
                                                <option value="podoplanine">podoplanine</option>
                                                <option value="protéine amyloïde">protéine amyloïde</option>
                                                <option value="PSA">PSA</option>
                                                <option value="RCC">RCC</option>
                                                <option value=" Panel Sein (RE, RP, Ki-67, HER2)"> Panel Sein (RE, RP, Ki-67, HER2)</option>
                                                <option value="récepteurs aux estrogénes (RE)">récepteurs aux estrogénes (RE)</option>
                                                <option value="récepteurs à la progestérone(RP)">récepteurs à la progestérone(RP)</option>
                                                <option value="SALL4">SALL4</option>
                                                <option value="sérotonine">sérotonine</option>
                                                <option value="STAT6">STAT6</option>
                                                <option value="synaptophysine">synaptophysine</option>
                                                <option value="TdT">TdT</option>
                                                <option value="Thyroglobuline">Thyroglobuline</option>
                                                <option value="TTF-1">TTF-1</option>
                                                <option value="vimentine">vimentine</option>
                                                <option value="WT1">WT1</option>
                                                <option value="HUM protein Homolog 1">HUM protein Homolog 1</option>
                                                <option value="HUM protein Homolog 2">HUM protein Homolog 2</option>
                                                <option value="HUM protein Homolog 6">HUM protein Homolog 6</option>
                                                <option value="HUM PM S2">HUM PM S2</option>
                                                <option value="Autres">Autres</option>
                                      
                                    </select>
                                    @if ($errors->any('panel_marquage'))
                                        <span class="text-danger">{{ $errors->first('panel_marquage') }}</span>
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
        $('#panel').select2({
            theme: "classic"
            

        });
        
    });
   
   

</script>


     



@endsection