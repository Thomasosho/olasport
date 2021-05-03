<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Contact;
use App\Models\About;
use App\Models\Category;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;

class PolicyController extends Controller
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
            $policy = Policy::first();

            return view('policy.index', compact('about', 'policy', 'contact', 'category', 'social', 'cat', 'cart'));
        }
        $about = About::first();
        $contact = Contact::first();
        $category = Category::all();
        $social = Social::first();
        $cat = Category::all();
        $policy = Policy::first();

        return view('policy.index', compact('about', 'policy', 'contact', 'category', 'social', 'cat'));
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
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
        return view('policy.edit', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policy $policy)
    {
        $policy->title = $request->input('title');
        $policy->text = $request->input('text');
        $policy->save();

        return back()->with('success', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        //
    }
}
