@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Minhas Páginas: <br>
        <a href="{{ route('painel.notas.create') }}" class="btn btn-sm btn-success">Nova Página</a>
    </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th width="50">ID</th>
                    <th>Título</th>
                    <th>Texto</th>
                    <th width="200">Ações</th>
                </tr>
                @foreach ($users->notas as $nota)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $nota['name'] }}</td>
                        <td>{{ $nota['text'] }}</td>
                        <td>
                            <a href="{{ route('painel.notas.edit', $nota->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('painel.notas.destroy', $nota->id) }}" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection

<link rel="stylesheet" href="'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'">
