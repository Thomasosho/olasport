<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Contact;
use App\Models\About;
use App\Models\Category;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
            $about = About::first();
            $contact = Contact::first();
            $category = Category::all();
            $social = Social::first();
            $cat = Category::all();
            $cart = User::findorfail(auth()->user()->id)->cart;
            $size = Size::first();

            return view('size.index', compact('about', 'size', 'contact', 'category', 'social', 'cat', 'cart'));
        }
        $about = About::first();
        $contact = Contact::first();
        $category = Category::all();
        $social = Social::first();
        $cat = Category::all();
        $size = Size::first();

        return view('size.index', compact('about', 'size', 'contact', 'category', 'social', 'cat'));
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
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        if($request->hasFile('image'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
        } 
        else 
        {
            $fileNameToStore = $about->image;
        }

        $size->image = $fileNameToStore;
        $size->title = $request->input('title');
        $size->text = $request->input('text');
        $size->save();

        return back()->with('success', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        //
    }
}
