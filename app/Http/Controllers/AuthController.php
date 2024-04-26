<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    public function login_page()
    {

        return view('admin.modules.auth.login');
    }
    public function login(Request $request)
    {
        // Validate the login data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->route('admin.dashboard'); // Redirect to the intended URL or a default one
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']); // You can customize the error message
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function user_login_page()
    {
        return view('frontend.modules.login');
    }
    public function user_register_page()
    {
        return view('frontend.modules.register');
    }
    public function user_register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = "user";


        $user->save();
        return redirect()->back()->with(['success' => 'user Created Successfully']);

    }
    public function user_login(Request $request)
    {
        // Validate the login data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->route('user.dashboard'); // Redirect to the intended URL or a default one
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']); // You can customize the error message
        }
    }
    public function user_logout()
    {
        Auth::logout();
        return redirect()->route('user.login.page');
    }
}
