@extends('admin.dashboard')

@section('content_title', 'Editar pessoa')

@section('dashboard-content')

    <form action="{{route('system.persons.update', $person->id)}}" method="POST" >
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{$person->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="gender">Gênero</label>
            <input type="text" name="gender" value="{{$person->gender}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="birth_date">Data de Nascimento</label>
            <input type="date" name="birth_date" value="{{$person->birth_date}}" class="form-control">
        </div>
        

        <button type="submit" class="btn btn-success">Confirmar</button>
    </form>

@endsection