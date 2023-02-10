<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">


        </div>
        <img style="height: 120%" src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}" alt="">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} ₴    </p>

            <form action="{{route('basket-add', $product)}}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В кошик</button>
                <a href="{{route('product', [$product->category->code, $product->name])}}" class="btn btn-default" role="button">Деталі</a>
                @csrf
            </form>



        </div>
    </div>
</div>
{{--{{route('product', [$product->category->code, $product->code])}}--}}
