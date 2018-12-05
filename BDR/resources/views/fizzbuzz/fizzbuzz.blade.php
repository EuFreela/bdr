@extends('layouts.app')
@section('title', 'BDR')

@section('content')
    
    <div class="container">
        
        <h1 class="h4">1. Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima “Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos de ambos (3 e 5), imprima “FizzBuzz”.</h1>
        <br>
        
        <div class="btn-toolbar mb-2 mb-md-0">
            
            <b>Multiplos de 3:&nbsp;</b>
            @foreach($multiple_3 as $m3)
                {{$m3}}
            @endforeach
            
        </div>

         <div class="btn-toolbar mb-2 mb-md-0">
         
            <b>Multiplos de 5:&nbsp;</b>
            @foreach($multiple_5 as $m5)
                {{$m5}}
            @endforeach

        </div>

        <div class="btn-toolbar mb-2 mb-md-0">
         
            <b>Multiplos de 3 e 5:&nbsp;</b>
            @if($multiple_3and5)
                @foreach($multiple_3and5 as $m3and5)
                    {{$m3and5}}
                @endforeach
            @else
                <i>Não há dados</i>
            @endif

        </div>

        <br>
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>        
    </div>


    <div class="container" style="margin-top:50px;">
        <section id="resume">

            <h2>Sobre</h2>

            <p>Para este exercício foi criado uma <i>Controller</i> chamada <i>BDRController</i>.</p>
            
            <p>Nela contem os métodos principais:</p>
            <ul>
                <li><b>1. index():</b> responsável pela chamada da <i>view fizzbuzz</i> </li>
                <li><b>2. calcFizzBuzz():</b> responsável cálculos dos numeros multiplos de 3 e 5</li>                    
            </ul>

            <p>A view joga dois vetores <i>multiple_3</i> e <i>multiple_5</i> contendo os <i>arrays</i> que são mostrados no display ao serem percorridos por m <i>foreach</i>.</p>
            <p>Em resumo, o cálculo é feito na <i>controller</i> e não na <i>view</i>.</p>
           
        </section>
    </div
    


@endsection