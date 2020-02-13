@extends('admin.dashboard')

@section('content_title', 'Cadastrar turma')


@section('dashboard-content')
<form action="{{route('system.teams.insert')}}" method="POST" >
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" placeholder="Nome da turma">
    </div>
    
    <button type="submit" class="btn btn-success">Confirmar</button>
</form>


@endsection