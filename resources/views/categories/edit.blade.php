@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Categorias</h1>
    <a href="{{ route('categories') }}" class="btn btn-success">Voltar</a>
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

    <form action="{{ route('categoriesUpdate', $categories->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome: *</label>
            <input type="text" name="name" class="form-control" value="{{ $categories->name }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</div>
@endsection