@extends('admin.table')

@section('content_title', 'Alunos')

@section('action-buttons')


<a class="btn btn-primary" href="{{route('system.persons.create')}}">Inserir registro</a>

@endsection
@section('table-header')
<thead>
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>Gênero</th>
      <th>Data de nascimento</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>
</thead>
@endsection


@section('table-content')
<tbody>
    @foreach ($students as $item)
    <tr>
        <td>{{$item->person->id}}</td>
        <td>{{$item->person->name}}</td>
        <td>{{$item->person->gender}}</td>
        <td>{{$item->person->brDate()}}</td>
        <td>
            <a href="{{route('system.persons.edit', $item->person->id)}}" class="btn btn-primary">Editar</a>
        </td>
        <td>
            <a href="{{route('system.students.delete', $item->person->id)}}" class="btn btn-danger">Excluir</a>
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
      <th>Gênero</th>
      <th>Data de nascimento</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>
</tfoot>
@endsection





