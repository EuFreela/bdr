@extends('layouts.app')
@section('title', 'Criar Tarefas')
@section('content')

    <div class="container">       

        <h1 class="h4">Editar Tarefa</h1>
        <a href="{{route('home')}}">Voltar</a>
        <br><br>
        
        <div class="">
                   
            <form method="post" action="{{route('task.putedit',$task->id)}}">
            @method('PUT')

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="Titulo" class="form-control" placeholder="Defina o título da tarefa" value="{{$task->name}}" style="width: 75%;">
                </div>
                <div class="form-group">
                    <label for="title">Prioridade</label><br>
                    <select name="Prioridade">
                        @isset($priority)
                            @foreach($priority as $p)
                                @if($p->id == $task->priority_id)
                                    <option value="{{$p->id}}" selected>{{$p->name}}</option>
                                @else
                                    <option value="{{$p->id}}">{{$p->name}}</option>
                                @endif
                            @endforeach
                        @endisset
                    </select>                        
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label><br>
                    <textarea name="Descricao" cols="" rows="5" style="width: 75%;">{{$task->description}}</textarea>
                </div>                    
                <button type="submit" class="btn btn-primary">Editar</button>

            @csrf
            </form>

        </div>

    </div>

    <div class="container" style="margin-top:50px;">
        <section id="resume">
        <h2>Sobre</h2>
        <p>Para este exercício é usada a mesma <i>Controller</i> do exercício anterior, <i>TaskController</i>. Nela é carregado um array e uma variável: 1. as tarefa escolhida para edição; e 2. a lista de prioridades cadastradas no sistema.</p>
        <p>Nela contem os métodos principais:</p>
        <ul>
            <li><b>1. getEdit($id):</b> responsável pela chamada da <i>view</i>. Como parâmetro, ela envia o ID da tarefa cadastrada par ser carregada suas informações.</li>         
            <li><b>2. putEdit(Request $request, $id):</b> responsável pelo envio das informações de edição.</li>         
        </ul>        
        </section>
    </div>

@endsection