<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\Contact;
use App\Models\About;
use App\Models\Category;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;

class TermController extends Controller
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
            $term = Term::first();

            return view('term.index', compact('about', 'term', 'contact', 'category', 'social', 'cat', 'cart'));
        }
        $about = About::first();
        $contact = Contact::first();
        $category = Category::all();
        $social = Social::first();
        $cat = Category::all();
        $term = Term::first();

        return view('term.index', compact('about', 'term', 'contact', 'category', 'social', 'cat'));
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
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        return view('term.edit', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Term $term)
    {
        $term->title = $request->input('title');
        $term->text = $request->input('text');
        $term->save();

        return back()->with('success', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term)
    {
        //
    }
}
