<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        // False return redirect()->back()->withErrors();
        $user = new User();
        $user->fill($request->all());
        $user->password =  Hash::make($request->password);

        $user->save();
        return redirect(route('login'))->withSuccess('Utilisateur enregistré');
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function authentification(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|max:20'
        ]);
        $credentials =  $request->only('email', 'password');
        //return $credentials;

        if(!Auth::validate($credentials)) :
            return redirect(route('login'))
                    ->withErrors(trans('aut.failed'))
                    ->withInput();

        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return redirect()->intended(route('blog.index'));

    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    public function userList()
    {

        $users = User::Select()
        ->paginate(4);
        return view('auth.user-list', ['users' => $users]);
    }







}
