@extends('layouts.master')
@section('tittle', 'Карегорія ' . $category->name )
@section('content')


        <h1>
            {{$category->name}}

        </h1>

        <h4>
            Всього товарів в цій категорії: {{$category->products->count()}}
        </h4>

        <p>
            {{$category->description}}
        </p>

        <div class="row">
            @foreach($category->products as $product)
                @include('layouts.card', compact('product'))

            @endforeach
        </div>

@endsection
