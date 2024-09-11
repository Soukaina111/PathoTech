@extends('adminlte::page')

@section('title', 'Accueil')

@section('content_header')
    <h1>Accueil</h1>
@stop

@section('content')
    {{-- <div class="container"> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success"role="alert" >
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->role == 'Medecin') 

                   <p style="font-size:22px"> IT'S A BEAUTIFULL DAY TO SAVE LIVES <span style="color:blue"> Dr. {{auth()->user()->name}} !</span></p>
                   @else
                    <p style="font-size:22px"> IT'S A BEAUTIFULL DAY TO SAVE LIVES <span style="color:blue"> {{auth()->user()->name}} !</span></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
































    

   


    {{-- </div> --}}
@endsection
