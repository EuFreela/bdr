@extends('layouts.app')
@section('title', 'BDR')

@section('content')
    
    <div class="container">
        
        <h1 class="h4">2. Refatore o código abaixo, fazendo as alterações que julgar necessário.</h1>
        <br>

        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('navegaterefactor')}}">Link Navegar</a><br><br>
        </div>

        <a href="{{route('setrefactor')}}" class="btn btn-primary">Setar dados</a>
        <a href="{{route('eraserefactor')}}" class="btn btn-danger">Apagar dados</a><br><br>
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
        
    </div>

    <div class="container" style="margin-top:50px;">
        <section id="resume">

            <h2>Sobre</h2>

            <p>Para este exercício é usada a mesma <i>Controller</i> do exercício anterior, <i>BDRController</i>.</p>
            
            <p>Nela contem os métodos principais:</p>
            <ul>
                <li><b>1. Refactor():</b> responsável pelo código refatorado do enunciado. </li>
                <li><b>2. setRefactor():</b> responsável por inserir informações no Cookie e no Session, para exemplificar o uso do dos recursos definidos.</li>
                <li><b>3. eraseRefactor():</b> responsável por apagar as informações no Cookie e no Session, para exemplificar o uso do dos recursos definidos.</li>
                <li><b>4. navegateRefactor():</b> responsável por navegar como exemplo defido no recurso do enunciado.</li>

            </ul>

            <p>Os botões referem-se a cada métodos descrito como exemplificação de dados mantidos na Session e no Cookie e ao serem apagados.</p>
           
        </section>
    </div

@endsection