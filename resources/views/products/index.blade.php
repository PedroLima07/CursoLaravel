@extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>Produtos</h1>
        <a href="{{ route('create') }}" class="btn btn-success">Adicionar</a>
        <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id}}</td>
                        <td>{{ $product ->name }}</td>
                        <td>R$ {{ $product ->price }}</td>
                        <td>{{ $product ->quantity}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    @endsection
        