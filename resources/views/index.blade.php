@extends('layouts.master')

@section('tittle', 'Головна')
@section('content')

        <h1>Всі товари</h1>

        <div class="row">

            @foreach($products as $product)
                @include('layouts.card', compact('product'))

            @endforeach


        </div>

@endsection
