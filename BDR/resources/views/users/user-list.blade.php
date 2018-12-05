@extends('layouts.app')
@section('title', 'Lista de Tarefas')
@section('content')

  <div class="container">       
      
    <h1 class="h4">Lista de Usuários</h1> 
    <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    <br><br>

    <div class="btn-toolbar mb-2 mb-md-0">
          
      <table class="table">
        
        <thead>
          <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
            </thead>
            
            <tbody>
            @isset($user)
                @foreach($user as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>                                   
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
      <p>Para este exercício é usada a mesma <i>Controller</i> do exercício anterior, <i>BDRController</i>.</p>
      <p>Nela contem os métodos principais:</p>
      <ul>
          <li><b>1. getUserList():</b> responsável pela chamada da <i>view</i>. Nela é importado um array de usuarios cadastrados. </li>         
      </ul>
      <p>Foi criada uma Factory, para exemplificar um número relativo de usuário no sistema. Ao todo são 20 e todos com senha default (1234)</p>
    </section>
  </div>

@endsection