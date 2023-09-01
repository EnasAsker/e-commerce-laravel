<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Backtrace\Arguments\ReduceArgumentsAction;

class ProductController extends Controller
{
    public function allProducts(){
        $products = Product::get();
        return view('shop', ['products'=>$products]);
    }

    public function index(){
        $product = Product::take(4)->get();
        return view('index', ['product'=>$product]);
    }

    public function search(){
        $search_text = $_GET['search'];
        $products = Product::where('product_name', 'LIKE', '%'.$search_text.'%')->get();
        return view('search', compact('products'));
    }

    public function addToCart(Request $request){
        if ($request->session()->has('user')){
            $cart = new Cart;
            $cart->timestamps = false;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return back();
        }
        else{
            return redirect('/login');
        }
    }

    public function cartItems(){ //displays products data from table products using joins
        $userId = Session::get('user')['id'];
        $products = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $userId)
        ->select('products.*')
        ->get();
        return view ('cartItems', ['products'=>$products]);
    }


    //display the total price in a route
    public function order(){
        $userId = Session::get('user')['id'];
        $total = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $userId)
        ->sum('products.product_price');
        return view ('order', ['total'=>$total]);
    }

    
    //this function takes the products from cart and place them in the orders table
    //then empty the cart
    public function orderPlace(){
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id',$userId)->get();
        foreach ($allCart as $cart){
            $order = new Order;
            $order->user_id = $cart['user_id'];
            $order->product_id = $cart['product_id'];
            // check if product_id is not null before saving the order
            if ($order->product_id) {
                $order->save();
                Cart::where('user_id', $userId)->delete();
            }
        }
        return redirect('/');
    }

    public function myOrders(){
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $userId)
        ->get();
        return view('myOrders', compact('orders'));
    }






    // public function index (Request $request){
    //     $product = new Product;
    //     $product->name = $request->input('product_name');
    //     $product->price = $request->input('product_price');
    //     if ($request->hasFile('product_image')){
    //         $file = $request->file('product_image');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time().".".$extension;
    //         $file->move('images/', $filename);
    //         $product->product_image = $filename;
    //     }
    //     return view('index', ['product'=>$product]);
    // }
}
