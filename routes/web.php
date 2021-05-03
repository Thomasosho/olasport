<?php

use Illuminate\Support\Facades\Route;
use App\Models\Address;
use App\Models\About;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Social;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', 'App\Http\Controllers\IndexController');

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
});

Route::resource('/dashboard', 'App\Http\Controllers\DashboardController')->middleware('auth');

Route::resource('/category', 'App\Http\Controllers\CategoryController');

Route::resource('/product', 'App\Http\Controllers\ProductController')->middleware('auth');

Route::resource('/about', 'App\Http\Controllers\AboutController');

Route::resource('/contact', 'App\Http\Controllers\ContactController')->middleware('auth');

Route::resource('/socials', 'App\Http\Controllers\SocialController')->middleware('auth');

Route::resource('/slider', 'App\Http\Controllers\SliderController')->middleware('auth');

Route::get('/change-password', 'App\Http\Controllers\ChangePasswordController@index')->middleware('auth');
Route::post('/change-password', 'App\Http\Controllers\ChangePasswordController@store')->middleware('auth')->name('change.password');

Route::get('/contactus', 'App\Http\Controllers\ContactController@index');
Route::get('/policy', 'App\Http\Controllers\PolicyController@index');
Route::get('/size', 'App\Http\Controllers\SizeController@index');
Route::get('/terms', 'App\Http\Controllers\TermController@index');

Route::post('/sendmail', 'App\Http\Controllers\ContactController@contactmail');

Route::get('/prodctcategory/{id}', 'App\Http\Controllers\CategoryController@show');

// Cart Area
Route::post('/addToCart','App\Http\Controllers\CartController@addToCart')->name('addToCart')->middleware('auth');
Route::get('/viewcart','App\Http\Controllers\CartController@index');
Route::get('/cart/deleteItem/{id}','App\Http\Controllers\CartController@destroy');
Route::get('/cart/update-quantity/{id}/{quantity}','App\Http\Controllers\CartController@updateQuantity');
//

Route::post('/submit-order','App\Http\Controllers\OrderController@order');

// User order
Route::get('/my-order', 'App\Http\Controllers\UserController@order')->middleware('auth');

// Admin order
Route::resource('/orders', 'App\Http\Controllers\OrderController')->middleware('auth');

// Search
Route::get ( '/search', function () {
    if (auth()->user()) {
        $about = About::first();
        $contact = Contact::first();
        $category = Category::all();
        $social = Social::first();
        $cat = Category::all();
        $cart = User::findorfail(auth()->user()->id)->cart;

        return view ( 'product.search', compact('about', 'contact', 'category', 'social', 'cat', 'cart'));
    }
    $about = About::first();
    $contact = Contact::first();
    $category = Category::all();
    $social = Social::first();
    $cat = Category::all();
    
    return view ( 'product.search', compact('about', 'contact', 'category', 'social', 'cat'));
});

Route::post ( '/search', function (Request $request) {
    
    if (auth()->user()) {
        $q = $request->get ( 'q' );
    $about = About::first();
    $contact = Contact::first();
    $category = Category::all();
    $social = Social::first();
    $cat = Category::all();
    $cart = User::findorfail(auth()->user()->id)->cart;
    $product = Product::where ( 'name', 'LIKE', '%' . $q . '%' )->with('user')->get ();
    $warning = 1;
    
    if (count ( $product ) > 0)
        return view ( 'product.search' , compact('about', 'contact', 'category', 'social', 'cat', 'cart', 'product'))->withDetails ( $product )->withQuery ( $q );
    else
        return view ( 'product.search' , compact('about', 'warning', 'contact', 'category', 'social', 'cat', 'cart', 'product'))->with('error', 'No Details found. Try to search again !' );
    }

    $q = $request->get ( 'q' );
    $about = About::first();
    $contact = Contact::first();
    $category = Category::all();
    $social = Social::first();
    $cat = Category::all();
    $product = Product::where ( 'name', 'LIKE', '%' . $q . '%' )->with('user')->get ();
    $warning = 1;
    
    if (count ( $product ) > 0)
        return view ( 'product.search' , compact('about', 'contact', 'category', 'social', 'cat', 'product'))->withDetails ( $product )->withQuery ( $q );
    else
        return view ( 'product.search' , compact('about', 'warning', 'contact', 'category', 'social', 'cat', 'product'))->with('error', 'No Details found. Try to search again !' );
    
});

Route::resource('/term', 'App\Http\Controllers\TermController')->middleware('auth');
Route::resource('/policies', 'App\Http\Controllers\PolicyController')->middleware('auth');
Route::resource('/sizes', 'App\Http\Controllers\SizeController')->middleware('auth');

require __DIR__.'/auth.php';