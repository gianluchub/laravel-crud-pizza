@extends('layouts.main')

@section('header')
    <h1>Tutte le pizze</h1>
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Immagine</th>
                <th>Vegetariana</th>
                <th>Data creazione</th>
                <th>Data ultima modifica</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pizzas as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{!! number_format($item->price, 2) . " &euro;" !!}</td>
                    <td>{{ $item->img_path }}</td>
                    <td>{{ $item->vegetarian ? 'SI' : 'NO' }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td class="text-center">
                        <a href="{{ route('pizzas.show', $item->id) }}" class="btn btn-success"><i class="fas fa-search"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('pizzas.edit', $item->id) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('pizzas.destroy', $item->id) }}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questa pizza?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@section('footer')
    <div class="text-right">
        <a href="{{ route('pizzas.create')}}" class="btn btn-primary">Crea una nuova pizza</a>
    </div>
@endsection