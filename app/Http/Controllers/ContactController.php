<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\About;
use App\Models\Category;
use App\Models\Social;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'contactmail');
    }

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

            return view('contact.index', compact('about', 'contact', 'category', 'social', 'cat', 'cart'));
        }
        $about = About::first();
        $contact = Contact::first();
        $category = Category::all();
        $social = Social::first();
        $cat = Category::all();

        return view('contact.index', compact('about', 'contact', 'category', 'social', 'cat'));
    }

    public function contactmail(Request $request)
    {
        $contact = Contact::first();

        $email = $contact->email;
        
        $data = ([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'text' => $request->input('text'),
        ]);
        
        Mail::to($email)->send(new ContactMail($data));

        return back()->with('success', 'Message sent');
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
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->phone1 = $request->input('phone1');
        $contact->phone2 = $request->input('phone2');
        $contact->phone3 = $request->input('phone3');
        $contact->email = $request->input('email');
        $contact->save();
        return back()->with('success', 'Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
