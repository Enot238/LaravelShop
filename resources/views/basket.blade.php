@extends('layouts.master')
@section('tittle', 'Кошик' )
@section('content')


        <h1>Кошик</h1>
        <p>Оформлення замовлення</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Назва</th>
                    <th>Кількість</th>
                    <th>Ціна</th>
                    <th>Загальна вартість</th>
                </tr>
                </thead>
                <tbody>

                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{route('product', [$product->category->code, $product->code])}}">
                                <img height="56px" src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}">
                                {{$product->name}}
                            </a>
                        </td>
                        <td><span class="badge">{{$product->pivot->count}}</span>
                            <div class="btn-group form-inline">
                                <form action="{{route('basket-remove', $product)}}" method="POST">
                                    <button type="submit" class="btn btn-danger" href=""><span
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                    <input type="hidden" name="_token" value="6j4DkCLZdnKqMzot9gRwnC0E2yVSXGe09dJLeCdp">
                                    @csrf
                                </form>
                                <form action="{{route('basket-add', $product)}}" method="POST">
                                    <button type="submit" class="btn btn-success"
                                            href=""><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    <input type="hidden" name="_token" value="6j4DkCLZdnKqMzot9gRwnC0E2yVSXGe09dJLeCdp">
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td> {{$product->price}} ₴</td>
                        <td> {{$product->getPriceForCount()}} ₴</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Загальна вартість:</td>
                    <td>{{$order->getFullPrice()}}</td>
                </tr>
                </tbody>
            </table>
            <br>`
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="{{ route('basket-place') }}">Офомити замовлення</a>
            </div>
        </div>

@endsection
