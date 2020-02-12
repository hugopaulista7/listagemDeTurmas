@extends('admin.dashboard')

@section('content_title', 'Editar turma')

@section('dashboard-content')

    <form action="{{route('system.teams.update', $team->id)}}" method="POST" >
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{$team->name}}" class="form-control">
        </div>
        

        <button type="submit" class="btn btn-success">Confirmar</button>
    </form>

@endsection