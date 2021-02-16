@extends('layouts.main')

@section('header')
    <h1>Dettaglio pizza</h1>
@endsection

@section('content')
    <table class="table table-striped table-bordered">
        @foreach ($pizza->getAttributes() as $key => $value)
            @if ($key != 'img_path')
                <tr>
                    <td><strong>{{ $key }}</strong></td>
                    <td>{{ $value }} @if ($key == 'price') € @endif</td>
                </tr>
            @endif
        @endforeach
    </table>
@endsection

@section('footer')
    <div class="text-right">
        <a href="{{ route('pizzas.index')}}" class="btn btn-primary">Elenco pizze</a>
    </div>
@endsection