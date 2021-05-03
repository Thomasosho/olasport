<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\About;
use App\Models\Contact;
use App\Models\User;
use App\Models\Cart;
use App\Mail\RecieveMail;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        $order = Order::with('user','product')->paginate(10);
        return view('order.admin', compact('order'));
    }
    

    public function order(Request $request)
    {
        $cart = User::findorFail(auth()->user()->id)->cart;
        foreach ($cart as $cart_data){

            $order = new Order;
            $order->product_id = $cart_data->product_id;
            $order->user_id = $cart_data->user_id;
            $order->amount = $cart_data->price;
            $order->quantity = $cart_data->quantity;
            $order->delivery_fee = $cart_data->delivery_fee;
            $order->color = $cart_data->color;
            $order->size = $cart_data->size;
            $order->status = 'processing';
            $order->address = $request->input('address');
            $order->phone = $request->input('phone');
            $order->save();

            $delete_item=Cart::findOrFail($cart_data->id);
            $delete_item->delete();
        }

        $contact = Contact::first();

        $email = $contact->email;

        $email1 = auth()->user()->email;
        
        $data = ([
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'text' => $request->input('text'),
        ]);
        
        Mail::to($email)->send(new RecieveMail($data));

        Mail::to($email1)->send(new OrderMail($data));

        return redirect('/')->with('success','Order Successfully place!');
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->status = 'completed';
        $order->save();

        return back()->with('success', 'Delivered to user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return back()->with('success', 'deleted');
    }
}
