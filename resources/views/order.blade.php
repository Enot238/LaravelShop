@extends('layouts.master')
@section('tittle', 'Оформити замовлення' )
@section('content')


        <h1>Підтвердження замовлення:</h1>
        <div class="container">
            <div class="row justify-content-center">
                <p>Загальна вартість замовлення: <b>{{$order->getFullPrice()}}</b></p>
                <form action="{{route('basket-confirm')}}" method="POST">
                    <div>
                        <p>Вкажіть своє ім'я та номер телефону, щоб наш менеджер зв'язався з вами</p>

                        <div class="container">
                            @auth()
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Імя: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефону: </label>

                                    <div class="col-lg-4">
                                        <input type="text" name="phone" id="phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}" class="form-control">
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="name" class="control-label col-lg-offset-3 col-lg-2">Імя: </label>
                                        <div class="col-lg-4">
                                            <input type="text" name="name" id="name" value="" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефону: </label>

                                        <div class="col-lg-4">
                                            <input type="text" name="phone" id="phone" value="" class="form-control">
                                        </div>
                                @endif

                            </div>
                            <br>
                            <br>
{{--                            <div class="form-group">--}}
{{--                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Email: </label>--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <input type="text" name="email" id="email" value="" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <br>
                        @csrf
                        <input type="hidden"> <input
                            type="submit" class="btn btn-success" value="Затвердити замовлення">
                    </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
