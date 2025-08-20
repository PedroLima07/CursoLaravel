@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Produto</h1>
    <a href="{{ route('products') }}" class="btn btn-success">Voltar</a>
    <hr>

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ( $errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif

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

    <form action="{{ route('store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome: *</label>
            <input type="text" name="name" class="form-control">
        </div>

                
        <div class="mb-3">
            <label class="form-label">Preço: *</label>
            <input type="text" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Quantidade: *</label>
            <input type="text" name="quantity" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <textarea name="description" class="form-control" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>
@endsection