<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use http\Exception\BadUrlException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket(){
        $orderId=session('orderId');
        if (!is_null($orderId)){
            $order=Order::findOrFail($orderId);
        }
//        dd($order);
        return view('basket', compact('order'));
    }



    public function basketConfirm(Request $request)
    {

        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);


        if ($success) {
            session()->flash('success', 'Ваше замовлення прийнято на обробку!');
        } else {
            session()->flash('warning', 'Помилка! Повторіть спробу.');
        }

        return redirect()->route('index');

    }




    public function basketPlace(){

        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));

    }

    public function basketAdd($productId){

//        $orderId = session('orderId');
//
//        if(is_null($orderId)){
//
//            $order = Order::create()->id;
//
//        }else{
//
//            $order = Order::find($orderId);
//
//        }
////        dd($orderId);
//        $order->products()->attach($productId);
//
//        return redirect()->route('basket');

        $orderId = session('orderId');
        if (is_null($orderId))
        {
            $order = Order::create();
            session(['orderId' => $order->id]);
//            dd($orderId);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($productId))
        {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {

            $order->products()->attach($productId);
        }

        if(Auth::check()){
            $order->user_id = \Illuminate\Support\Facades\Auth::user()->id;
        }

        $product=Product::find($productId);

        session()->flash('success', 'добавлено ' . $product->name);

        return redirect()->route('basket');
    }

    public function basketRemove($productId){
        $orderId=session('orderId');
        if (is_null($orderId)){
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);


        if ($order->products->contains($productId))
        {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count<2){
                $order->products()->detach($productId);
            }
            else{
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $product=Product::find($productId);

        session()->flash('warning', 'видалено ' . $product->name);

        return redirect()->route('basket');
    }

}
