<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::paginate(5));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.profile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('error', 'You cannot edit this yourself.');
        }

        return view('admin.users.edit')->with(['user' => User::find($id), 'roles' => Role::all(), 'users' => User::all()]);
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
        if (Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('error', 'You cannot edit this yourself.');
        }

        $this->validate(request(), [
            'roles' => 'required',
        ]);
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        $user->save();
        
        
        return redirect()->route('admin.users.index')->with('success', 'User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('error', 'You cannot delete this yourself.');
        }

        $user = User::find($id);

        $product = Product::all()->where('user_id' , $user->id);
        if ($product->count() > 1) {
            $product->delete();
        }

        if($user) {
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User has been deleted');
        }
        return redirect()->route('admin.users.index')->with('error', 'This user cannot be deleted');
    }
}
