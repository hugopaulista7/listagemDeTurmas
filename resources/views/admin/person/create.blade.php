@extends('admin.dashboard')

@section('content_title', 'Cadastrar pessoa')


@section('dashboard-content')

<form action="{{route('system.persons.insert')}}" method="POST" >
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" placeholder="Nome da pessoa">
    </div>
    <div class="form-group">
        <label for="gender">Gênero</label>
        <input type="text" name="gender" class="form-control" placeholder="Gênero da pessoa">
    </div>
    <div class="form-group">
        <label for="birth_date">Data de Nascimento</label>
        <input type="date" name="birth_date" class="form-control" placeholder="Data de nascimento">
    </div>

    <div class="form-group">
        <input type="checkbox" name="student">
        <label for="student" class="form-check-label">É Aluno</label>
    </div>
    
    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

@endsection