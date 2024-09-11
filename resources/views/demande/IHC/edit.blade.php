@extends('adminlte::page')

@section('title', 'Edit IHC')

@section('content_header')

    <h1>Edit IHC</h1>

@stop

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Data Table</title>
    <div class="container mt-5">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('M_Demandes') }}">Retour </a>
        </div>
        <form action="{{ route('IHC.update', $demande->id) }}" method="post">
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
                <label for="description" class="col-sm-2 col-form-label">Panel Marquage </label>
                <div class="col-sm-10" >
                    <select id="panel" class="form-control panel"  name="panel_marquage[]" multiple="multiple" style="width: 100%;"   >
                        {{-- <option value="{{ old('panel_marquage') }}"  selected > {{ old('panel_marquage') }}</option> --}}
                         {{-- <input class="form-control" name="Panel_marquage" value="{{ $demande->Panel_Marquage }}"> --}}
                        {{-- <input class="form-control"  >  --}}
                        {{-- <datalist id="datalistOptions"  class="text-center"> --}}
                        <option value="{{ $demande->Panel_Marquage}}" selected style="display:none">{{ $demande->Panel_Marquage}}</option>

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
                            {{-- </datalist> --}}
                            
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="organe" class="col-sm-2 col-form-label">Commentaire</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="commentaire_d" >{{ $demande->Commentaire_D }}</textarea>
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
        $('#panel').select2({
            theme: "classic"
            

        });
        
    });
   
   

</script>


     



@endsection
