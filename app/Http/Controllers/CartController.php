<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\About;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Social;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        $contact = Contact::first();
        $category = Category::all();
        $social = Social::first();
        $cat = Category::all();
        $cart = User::findorfail(auth()->user()->id)->cart;
        $cart_datas = User::findorfail(auth()->user()->id)->cart;
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            if ($cart_data) {
                $total_price+=$cart_data->price*$cart_data->quantity+$cart_data->delivery_fee;
                $product = Product::find($cart_data->product_id);
                $cate = Product::find($cart_data->product_id)->category;

                return view('cart', compact('about', 'product', 'cate', 'contact', 'cart', 'cart_datas', 'cart','total_price', 'about', 'contact', 'category', 'social', 'cat'));
            }
        }

        return view('cart', compact('about', 'contact', 'cart', 'cart_datas', 'cart','total_price', 'about', 'contact', 'category', 'social', 'cat'));
    }

    public function addToCart(Request $request)
    {
        $inputToCart = $request->except('_token');

        $cart = User::findorfail(auth()->user()->id)->cart;

        $product = Product::findOrFail($request->product_id); //get product
        $user = auth()->user();
        $exists = $user->cart()->where('product_id', $request->product_id)->get();
        if ($exists->count()) {
            return back()->with('error','It already exist in Cart');
        }

        $user = User::findOrFail($request->user_id);

        $product = Product::find($request->product_id);

        $keep = new Cart;
        $keep->product_id = $request->input('product_id');
        $keep->user_id = $request->input('user_id');
        $keep->quantity = $request->input('quantity');
        $keep->delivery_fee = $product->delivery_fee;
        $keep->color = $request->input('color');
        $keep->size = $request->input('product_radio');
        $keep->price = $product->price;
        $keep->save();
        return back()->with('success','Added To Cart');
    }

    public function updateQuantity($id,$quantity)
    {
        
        DB::table('carts')->where('id',$id)->increment('quantity', $quantity);
        return back()->with('success','Update Quantity already');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $user = auth()->user();
        $remove = $user->cart()->get();
        $remove->each->delete();
        return back()->with('success','Removed Successfully!');
    }
}
