@extends('layouts.app')
@section('title', 'Lista de Tarefas')
@section('content')

    <div class="container">       

      <h1 class="h4">Lista de Tarefa</h1>
      <a href="{{route('home')}}">Voltar</a>
      <br><br>

      <div class="btn-toolbar mb-2 mb-md-0">
          
        <table class="table">
          <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Prioridade</th>
                <th>Edição</th>
            </tr>
          </thead>
            
          <tbody>
            @isset($task)
              @foreach($task as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{DB::table('priority')->where('id','=',$task->priority_id)->first()->name}}</td>
                    <td>
                    <a href="{{route('task.getedit',$task->id)}}" class="btn btn-primary" style="margin-right: 10px;">Editar</a>
                    <a href="{{route('task.delete',$task->id)}}" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
              @endforeach
            @endisset
          </tbody>
              
        </table>  

    </div>
  </div>

  <div class="container" style="margin-top:50px;">
    <section id="resume">
      <h2>Sobre</h2>
      <p>Para este exercício é usada a mesma <i>Controller</i> do exercício anterior, <i>TaskController</i>.</p>
      <p>Nela contem os métodos principais:</p>
      <ul>
          <li><b>1. getList():</b> responsável pela chamada da <i>view</i>. Nela é importado um array das tarefas cadastradas. </li>         
      </ul>
      <p>Nesta view econtra-se um lista responsiva com duas opções, partes do CRUD: edição e ecxlusão de informação.</p>
    </section>
  </div>

@endsection