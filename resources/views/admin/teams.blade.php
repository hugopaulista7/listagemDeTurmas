@extends('admin.table')

@section('content_title', 'Turmas')

@section('action-buttons')


<a class="btn btn-primary" href="{{route('system.teams.create')}}">Inserir registro</a>

@endsection
@section('table-header')
<thead>
    <tr>
      <th>#</th>
      <th>Nome</th>      
      <th>Editar</th>
      <th>Excluir</th>
    </tr>
</thead>
@endsection


@section('table-content')
<tbody>
    @foreach ($teams as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>
            <a href="{{route('system.teams.edit', $item->id)}}" class="btn btn-primary">Editar</a>
        </td>
        <td>
            <a href="{{route('system.teams.delete', $item->id)}}" class="btn btn-danger">Excluir</a>
        </td>

    </tr>
    @endforeach
</tbody>

@endsection

@section('table-footer')
<tfoot>
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>
</tfoot>
@endsection





