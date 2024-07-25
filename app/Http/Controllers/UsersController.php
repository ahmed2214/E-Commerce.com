<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Product = Product::paginate(10);
        return view('users.index',['Product'=>  $Product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("auth.registrationForm");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email','min:3'],
            'password' => ['required',Password::min(8)->mixedCase()->numbers()->symbols()],
            'phone' => ['required' ,'numeric','min:11'],
            'Addresses' => ['required','min:8'],
        ]);
        User::create([
            'name'=>$request->input('name'),
            'email'=> $request->input('email'),
            'password'=>Hash::make($request->input('password')) ,
            'phone'=> $request->input('phone'),
            'Addresses'=> $request->input('Addresses'),
        ] );
        return  redirect('usersIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function showloginform()
    {
        //
        return view("auth.loginForm");
    }
    
    public function login(Request $request)
    {
        //
        $request->validate([
            'email' => ['required', 'email','min:3'],
            'password' => ['required',Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);
         $email = $request->email;
        $user = $user = User::where('email', $email)->first();
        if($user && Hash::check($request->password,  $user->password)){
            Auth::login($user);
            session()->put('user', $user->name);
            session()->put('user_permissions', $user->user_permissions);
            return  redirect('usersIndex');
        }
        else {
            return  redirect()->back()->withErrors(['email'=>'these credentials do not match our records ']);
        }
    }
    public function getSignOut() {
		
        Auth::logout();
        session()->forget('user');
        session()->forget('user_permissions');
        return redirect()->route('users.index');
        
    }
}
