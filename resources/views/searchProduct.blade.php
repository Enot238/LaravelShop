@extends('layouts.master')

@section('tittle', 'Головна')
@section('content')

    <h1>Пошук</h1>

    <div class="row">



        @if(empty($products[0]))
            <h2>По запиту "{{$q}}" нічого не знайдено:(</h2>
        @endif

        @foreach($products as $product)

            @include('layouts.card', compact('product'))

        @endforeach


    </div>

@endsection
