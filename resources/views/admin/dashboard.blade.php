@extends('adminlte::page')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
@section('title', 'Painel Administrativo | Lista de Estudantes')

    @section('content_header')
    <h1>
        @yield('content_title', 'Dashboard')
    </h1>


    @endsection
    @section('content')

    <div class="row mb-2 ml-1">
        <div class="btn-toolbar">
            <div class="col-12 justify-content-end">
                @yield('action-buttons')
            </div>
        </div>
    </div>

    <div class="container">
        @yield('dashboard-content')

        
    </div>
    @endsection
    @stack('dash-js')

    
