@extends('auth.layouts.master')

@section('title', 'Товари')

@section('content')
    <div class="col-md-12">
        <h1>Товари</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Назва
                </th>
                <th>
                    Категорія
                </th>

                <th>
                    Доступні Дії
                </th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>

                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">Відкрити</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">Редагувати</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Видалити"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
        <a class="btn btn-success" type="button" href="{{ route('products.create') }}">Добавити товар</a>
    </div>
@endsection
