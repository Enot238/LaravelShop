@extends('layouts.master')
@section('tittle', 'Товар' )
@section('content')

    <style>


        .container1 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px;
            display: flex;
        }

        .right-column {
            width: 35%;
            margin-top: 60px;
        }
        .left-column img {
            width: 80%;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .left-column img.active {
            opacity: 1;
        }
        .product-description {
            border-bottom: 1px solid #E1E8EE;
            margin-bottom: 20px;
        }
        .product-description span {
            font-size: 12px;
            color: #358ED7;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
        }
        .product-description h1 {
            font-weight: 300;
            font-size: 52px;
            color: #43484D;
            letter-spacing: -2px;
        }
        .product-description p {
            font-size: 16px;
            font-weight: 300;
            color: #86939E;
            line-height: 24px;
        }
    </style>
{{--        <h1>{{$product->name}}</h1>--}}
{{--        <h2>{{$category->name}}</h2>--}}
{{--        <p>Ціна: <b>{{$product->price}}</b></p>--}}
{{--        <img style="height: 50% " src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}">--}}
{{--        <p>{{$product->description}}</p>--}}

{{--        <form action="{{route('basket-add', $product)}}" method="POST">--}}

{{--            <button type="submit" class="btn btn-success" role="button">Добавити в кошик</button>--}}

{{--            <input type="hidden" name="_token" value="6j4DkCLZdnKqMzot9gRwnC0E2yVSXGe09dJLeCdp">--}}
{{--            @csrf--}}
{{--        </form>--}}



        <main class="container1">

            <!-- Left Column / Headphones Image -->
            <div class=".left-column img.active">
                <img data-image="black" src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}" alt="">
            </div>


            <!-- Right Column -->
            <div class="right-column">

                <!-- Product Description -->
                <div class="product-description">
                    <span>{{$category->name}}</span>
                    <h1>{{$product->name}}</h1>
                    <p>{{$product->description}}</p>
                </div>


                <!-- Product Pricing -->
                <div class="product-price">
                    <span> Ціна: {{$product->price}} грн</span>
{{--                    <a href="#" class="cart-btn">Add to cart</a>--}}
                    <form action="{{route('basket-add', $product)}}" method="POST">

                        <button type="submit" class="btn btn-success" role="button">Добавити в кошик</button>

                        <input type="hidden" name="_token" value="6j4DkCLZdnKqMzot9gRwnC0E2yVSXGe09dJLeCdp">
                        @csrf
                    </form>
                </div>
            </div>
        </main>
@endsection
