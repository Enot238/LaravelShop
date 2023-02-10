@extends('layouts.master')
@section('tittle', 'Всі категорії' )
@section('content')



        @foreach($categories as $category)
            <div class="panel">
                <a href="{{route('category', $category->code)}}">
                    <img height="100px" src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}">
                    <h2>{{$category->name}}</h2>
                </a>
                <p>
                    {{$category->description}}
                </p>
            </div>
        @endforeach



@endsection
