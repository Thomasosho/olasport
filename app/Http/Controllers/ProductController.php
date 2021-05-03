<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\About;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $products = Product::with(['category'])->paginate(5);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create', compact('category'));
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
            'image' => 'required',
            'category' => 'required',
            'price' => 'required',
            'delivery_fee' => 'required',
        ]);

        // dd($request->input('size'));
        if($request->hasFile('image')){
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
        } else {
            $fileNameToStore = 'noimmage.jpg';
        }

        if($request->hasFile('image1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image1')->storeAs('public/image', $fileNameToStore1);
        } else {
            $fileNameToStore1 = 'noimmage.jpg';
        }

        if($request->hasFile('image2')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image2')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image2')->storeAs('public/image', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimmage.jpg';
        }

        if($request->hasFile('image3')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image3')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3 = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image3')->storeAs('public/image', $fileNameToStore3);
        } else {
            $fileNameToStore3 = 'noimmage.jpg';
        }

        if($request->hasFile('image4')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image4')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image4')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore4 = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image4')->storeAs('public/image', $fileNameToStore4);
        } else {
            $fileNameToStore4 = 'noimmage.jpg';
        }

        $product = new Product;
        $product->image = $fileNameToStore;
        $product->image1 = $fileNameToStore1;
        $product->image2 = $fileNameToStore2;
        $product->image3 = $fileNameToStore3;
        $product->image4 = $fileNameToStore4;
        $product->name = $request->input('name');
        $product->category_id = $request->input('category');
        $product->price = $request->input('price');
        $product->delivery_fee = $request->input('delivery_fee');
        $product->custom_color1 = $request->input('custom_color1');
        $product->custom_color2 = $request->input('custom_color2');
        $product->custom_color3 = $request->input('custom_color3');
        $product->custom_color4 = $request->input('custom_color4');
        $product->custom_color5 = $request->input('custom_color5');
        $product->custom_color6 = $request->input('custom_color6');
        
        $small = 'small';
        if (in_array($small, $request->input('size'))) {
            $product->s = 'small';
        }
        $medium = 'medium';
        if (in_array($medium, $request->input('size'))) {
            $product->m = 'medium';
        }
        $large = 'large';
        if (in_array($large, $request->input('size'))) {
            $product->l = 'large';
        }
        $xlarge = 'x-large';
        if (in_array($xlarge, $request->input('size'))) {
            $product->xl = 'x-large';
        }
        $xxlarge = 'xx-large';
        if (in_array($xxlarge, $request->input('size'))) {
            $product->xxl = 'xx-large';
        }
        $product->save();
        return back()->with('success', 'Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $about = About::first();
        $contact = Contact::first();
        $category = Category::all();
        $social = Social::first();
        $cat = Category::all();
        $categ = $product->category;
        $cart = User::findorfail(auth()->user()->id)->cart;

        return view('product', compact('about', 'contact', 'category', 'social', 'cat', 'product', 'categ', 'cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cat = $product->category;
        $category = Category::all();
        return view('product.edit', compact('product', 'category', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'delivery_fee' => 'required',
        ]);

        if($request->hasFile('image')){
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
        } else {
            $fileNameToStore = $product->image;
        }

        if($request->hasFile('image1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image1')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image1')->storeAs('public/image', $fileNameToStore1);
        } else {
            $fileNameToStore1 = $product->image1;
        }

        if($request->hasFile('image2')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image2')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image2')->storeAs('public/image', $fileNameToStore2);
        } else {
            $fileNameToStore2 = $product->image2;
        }

        if($request->hasFile('image3')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image3')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3 = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image3')->storeAs('public/image', $fileNameToStore3);
        } else {
            $fileNameToStore3 = $product->image3;
        }

        if($request->hasFile('image4')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image4')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image4')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore4 = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image4')->storeAs('public/image', $fileNameToStore4);
        } else {
            $fileNameToStore4 = $product->image4;
        }

        $product->image = $fileNameToStore;
        $product->image1 = $fileNameToStore1;
        $product->image2 = $fileNameToStore2;
        $product->image3 = $fileNameToStore3;
        $product->image4 = $fileNameToStore4;
        $product->name = $request->input('name');
        $product->sold_out = $request->input('sold_out');
        $product->category_id = $request->input('category');
        $product->price = $request->input('price');
        $product->delivery_fee = $request->input('delivery_fee');
        $product->custom_color1 = $request->input('custom_color1');
        $product->custom_color2 = $request->input('custom_color2');
        $product->custom_color3 = $request->input('custom_color3');
        $product->custom_color4 = $request->input('custom_color4');
        $product->custom_color5 = $request->input('custom_color5');
        $product->custom_color6 = $request->input('custom_color6');
        
        $small = "small";
        if (in_array($small, $request->input('size'))) {
            $product->s = 'small';
        }
        
        if (in_array($small, $request->input('size')) == false) {
            $product->s = null;
        }

        $medium = 'medium';
        if (in_array($medium, $request->input('size'))) {
            $product->m = 'medium';
        }

        if (in_array($medium, $request->input('size')) == false) {
            $product->m = null;
        }

        $large = 'large';
        if (in_array($large, $request->input('size'))) {
            $product->l = 'large';
        }

        if (in_array($large, $request->input('size')) == false) {
            $product->l = null;
        }

        $xlarge = 'x-large';
        if (in_array($xlarge, $request->input('size'))) {
            $product->xl = 'x-large';
        }

        if (in_array($xlarge, $request->input('size')) == false) {
            $product->xl = null;
        }

        $xxlarge = 'xx-large';
        if (in_array($xxlarge, $request->input('size'))) {
            $product->xxl = 'xx-large';
        }
        
        if (in_array($xxlarge, $request->input('size')) == false) {
            $product->xxl = null;
        }

        $product->update();
        return back()->with('success', 'Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'deleted successfully');
    }
}
