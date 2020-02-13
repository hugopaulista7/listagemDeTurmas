@extends('admin.dashboard')

@section('content_title', 'Editar turma')

@section('dashboard-content')
@if(strlen(Session::get('message')) > 0)
<div class="alert alert-{{Session::get('messageClass')}}" role="alert">
    {{Session::get('message')}}
</div>
@endif
<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link" id="turma-link" data-hash="turma">Turma</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="alunos-link" data-hash="alunos">Alunos</a>
    </li>
</ul>
<div class="container" id="team-container">
    <form action="{{route('system.teams.update', $team->id)}}" method="POST" >
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{$team->name}}" class="form-control">
        </div>
        

        <button type="submit" class="btn btn-success">Confirmar</button>
    </form>
</div>

<div class="container" id="students-container" style="display: none;">
    <div class="row mb-3">
        <div class="col-3 ml-auto">
            <button class="btn btn-primary" id="add-student">Adicionar aluno</button>
        </div>
    </div>
    <table id="table" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Gênero</th>
              <th>Data de nascimento</th>
              <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($team->students as $item)
            
            <tr>
                <td>{{$item->person->id}}</td>
                <td>{{$item->person->name}}</td>
                <td>{{$item->person->gender}}</td>
                <td>{{$item->person->brDate()}}</td>
                <td>
                    <a href="{{route('system.team.detach', [$team->id, $item->id])}}" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Gênero</th>
              <th>Data de nascimento</th>
              <th>Excluir</th>
            </tr>
        </tfoot>

    </table>
</div>

<div class="modal" style="display:none;" tabindex="-1" role="dialog" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Adicionar Aluno</h5>
          </div>
          <div class="modal-body">
            <form action="{{route('system.team.attach', $team->id)}}" method="POST">
                {{ csrf_field() }}
                <select name="student" id="select-student" class="custom-select">
                    @foreach ($students as $student)
                    <option value="{{$student->id}}">
                        {{$student->person->name}}
                    </option>
                    @endforeach
                </select>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Salvar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" id="modal-close">Fechar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
</div>

@push('dash-js')
<script type="text/javascript">
    $(document).ready(() => {
        let hash = window.location.hash.replace('#', '');
        $('.nav-item').click((ev) => {
            hash = $(ev.target).data().hash;
            checkHash(hash);
        });

        $('#add-student').click((ev) => {
            ev.preventDefault();
            $('#modal').css('display', 'block');
        });

        $('#modal-close').click(() => {
            $('#modal').css('display', 'none');
        });

        const checkHash = () => {
            if (hash === 'turma' || hash.length <= 0) {
                $('#turma-link').addClass('active');
                $('#team-container').css('display', 'block');
                $('#alunos-link').removeClass("active");
                $('#students-container').css('display', 'none');
            } 
            if (hash === 'alunos') {
                $('#alunos-link').addClass("active");
                $('#students-container').css('display', 'block');
                $('#turma-link').removeClass("active");
                $('#team-container').css('display', 'none');
            }
        }

        checkHash(hash);
    });
</script>
@endpush
@endsection
