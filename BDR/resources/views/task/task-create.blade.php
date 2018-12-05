@extends('layouts.app')
@section('title', 'Criar Tarefas')
@section('content')
    
    <div class="container">       

        <h1 class="h4">Criar Tarefa</h1>
        <a href="{{route('home')}}">Voltar</a>
        <br><br>
        
        <div class="">
                   
            <form method="post" action="{{route('task.postcreate')}}">
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="Titulo" class="form-control" placeholder="Defina o título da tarefa" value="{{old('Titulo')}}" style="width: 75%;">
                </div>
                <div class="form-group">
                    <label for="title">Prioridade</label><br>
                    <select name="Prioridade">
                        @isset($priority)
                            @foreach($priority as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        @endisset
                    </select>                        
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label><br>
                    <textarea name="Descricao" cols="" rows="5" style="width: 75%;">{{old('Descricao')}}</textarea>
                </div>                    
                <button type="submit" class="btn btn-primary">Cadastrar</button>

            @csrf
            </form>

        </div>

    </div>

    <div class="container" style="margin-top:50px;">
        <section id="resume">
        <h2>Sobre</h2>
        <p>Para este exercício foi criado uma <i>Controller</i> chamada <i>TaskController</i>.</p>
        <p>Nela contem os métodos principais:</p>
        <ul>
            <li><b>1. getCreate():</b> responsável pela chamada da <i>view</i>. Nela é importado um array <i>priority</i> para carregar um combo-box dos níveis de prioridade possíveis.</li>         
            <li><b>2. postCreate(Request $request):</b> responsável pelo envio de parametros POST.</li>         
            <li><b>Observação</b> Não há um campo para CRUD de prioridades no sistema. As informações são defaults carregadas pelo seeder. Não foi pedido, por esse motivo não o criei.</li>
        </ul>
        </section>
    </div>

@endsection