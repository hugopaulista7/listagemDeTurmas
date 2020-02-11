@extends('adminlte::register')

@if($errors->any())
    <div class="error-message">
        <h4>
            {{$errors->first()}}
        </h4>
    </div>
@endif