<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\About;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Category;
use App\Models\User;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
            $product = Product::paginate(12);
        $contact = Contact::first();
        $about = About::first();
        $slider = Slider::all();
        $singleslider = Slider::first();
        $social = Social::first();
        $category = Category::all();
        $cat = Category::all();
        $cart = User::findorfail(auth()->user()->id)->cart;

        return view('index', compact('product', 'cart', 'contact', 'about', 'slider', 'singleslider', 'social', 'category', 'cat'));
        }

        $product = Product::paginate(12);
        $contact = Contact::first();
        $about = About::first();
        $slider = Slider::all();
        $singleslider = Slider::first();
        $social = Social::first();
        $category = Category::all();
        $cat = Category::all();

        return view('index', compact('product', 'contact', 'about', 'slider', 'singleslider', 'social', 'category', 'cat'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
