@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard | <a href="{{route('text.enunciado')}}" target="_blank">Enunciado</a></div>                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Fizz Buzz</h5>
                            <p class="card-text">Teste 1</p>
                            <a href="{{route('fizzbuzz')}}" class="btn btn-primary">Go</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Refatoração 1</h5>
                            <p class="card-text">Teste 2.</p>
                            <a href="{{route('refactor')}}" class="btn btn-primary">Go</a>
                        </div>
                        </div>
                    </div>
                    </div>

                    <hr>

                    <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Listar Usuários</h5>
                            <p class="card-text">Teste 3.</p>
                            <a href="{{route('user.getlist')}}" class="btn btn-primary">Go</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tarefas</h5>
                            <p class="card-text">Teste 4.</p>
                            <a href="{{route('task.getcreate')}}" class="btn btn-primary">Go</a>
                            @if(DB::table('task')->count()>0)
                                <a href="{{route('task.getlist')}}" class="btn btn-success">Lista</a>
                            @endif
                        </div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
