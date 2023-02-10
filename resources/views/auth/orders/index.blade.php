@extends('auth.layouts.master')

@section('title', 'Замовлення')

@section('content')

{{--    {{@\Illuminate\Support\Facades\Auth::user()->utype}}--}}

    <div class="col-md-12">
        <h1>Замовлення</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    №
                </th>
                <th>
                    Ім'я
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    Дата
                </th>
                <th>
                    Сума
                </th>
                <th>
                    Дії
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->getFullPrice()}}</td>
                                        <td>
                                            <div class="btn-group text-white" role="group">
                                                <a class="btn btn-success" type="button"
{{--                                                   @admin--}}
{{--                                                   href="{{ route('orders.show', $order) }}"--}}
{{--                                                   @else--}}
{{--                                                       href="{{ route('person.orders.show', $order) }}"--}}
{{--                                                   @endadmin--}}
                                                >Відкрити</a>
                                            </div>
                                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--        {{ $orders->links() }}--}}
    </div>
@endsection
