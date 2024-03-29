<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Social;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\About;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $cart = User::findorfail(auth()->user()->id)->cart;
        $contact = Contact::first();
        $social = Social::first();
        return view('category.index', compact ('categories', 'cart', 'contact', 'social'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $category = new Category;
        $category->name = $request->input('name');
        $category->text = $request->input('text');
        $category->save();
        return redirect('category')->with('success','Great! created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()) {
            $categ = Category::find($id);
            $category = Category::all();
            $cat = Category::all();
            $about = About::first();
            $categories = Product::where('category_id', $categ->id)->get();
            $contact = Contact::first();
            $social = Social::first();
            $cart = User::findorfail(auth()->user()->id)->cart;

            return view('category.show', compact ('categ', 'about', 'category', 'cat', 'categories', 'contact', 'social', 'cart'));
        }
        $categ = Category::find($id);
        $category = Category::all();
        $cat = Category::all();
        $about = About::first();
        $categories = Product::where('category_id', $categ->id)->get();
        $contact = Contact::first();
        $social = Social::first();

        return view('category.show', compact ('categ', 'about', 'category', 'cat', 'categories', 'contact', 'social'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact ('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->name = $request->input('name');
        $category->text = $request->input('text');
        $category->save();
        return redirect('category')->with('success','Great! updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('category')->with('success','Great! deleted successfully.');
    }
}
