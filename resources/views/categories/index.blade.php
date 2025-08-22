@extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>Categorias</h1>
        <a href="{{ route('categoriesCreate') }}" class="btn btn-success">Adicionar</a>
        <hr>
            @if (Session::has('sucess'))
            <div class="alert alert-success">
                <p>{{Session::get('sucess')}}</p>
            </div>   
            @endif

            @if (Session::has('error'))
            <div class="alert alert-danger">
                <p>{{Session::get('error')}}</p>
            </div>     
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id}}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('categoriesEdit', ['id' => $category->id]) }}" class="btn btn-primary mx-1">Editar</a>
                                <form action="{{route('categoriesDelete')}}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $category->id}}">

                                    <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Tem certeza que queres excluir estes categoria?');">
                                        Excluir
                                    </button>
                                </form>
                            </div>

            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    @endsection
        