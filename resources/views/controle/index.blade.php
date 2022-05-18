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
                @foreach ($users as $user)
                    @foreach ($user->notas as $notas)
                    {{-- @dd($user->notas) --}}
                        @if ($user->id == $userLogged->id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $notas->name }}</td>
                                <td>{{ $notas->text }}</td>
                                <td></td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </table>
        </div>
    </div>

    {{ $users->links('pagination::bootstrap-4') }}

@endsection
