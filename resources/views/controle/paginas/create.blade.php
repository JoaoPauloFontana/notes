@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Nova Nota: <br>
    </h1>
@endsection

@section('content')
    <form action="{{ route('painel.notas.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Título da nota</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="text">Tarefa</label>
                    <input type="text" name="text" class="form-control">
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Cadastrar Notas">
            </div>
        </div>
    </form>
@endsection
