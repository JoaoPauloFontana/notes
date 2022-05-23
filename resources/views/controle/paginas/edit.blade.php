@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Editar nota: <br>
    </h1>
@endsection

@section('content')
    <form action="{{ route('painel.notas.update', $notas->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Título da nota</label>
                    <input type="text" name="name" class="form-control" value="{{ $notas->name }}">
                </div>

                <div class="form-group">
                    <label for="text">Tarefa</label>
                    <input type="text" name="text" class="form-control" value="{{ $notas->text }}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cadastrar nota</button>
            </div>
        </div>
    </form>
@endsection
