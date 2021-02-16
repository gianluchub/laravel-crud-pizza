@extends('layouts.main')

@section('header')
    <h1>Crea una nuova pizza</h1>
@endsection

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pizzas.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Prezzo" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredienti</label>
            <textarea name="ingredients" class="form-control" id="ingredients" rows="4" placeholder="Ingredienti">{{ old('ingredients') }}</textarea>
        </div>

        <div class="form-group">
            <label for="img_path">Immagine</label>
            <input type="text" class="form-control" id="img_path" name="img_path" placeholder="Immagine" value="{{ old('img_path') }}">
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="vegetarian" id="vegetarian" 
                @if (old('vegetarian') == 1) checked @endif value="1">
                <label class="form-check-label" for="vegetarian">Vegetariana</label>
            </div>
        </div>

        <button class="btn btn-success">Salva</button>
        <a href="{{ route('pizzas.index')}}" class="btn btn-primary float-right">Elenco pizze</a>
    </form>
@endsection