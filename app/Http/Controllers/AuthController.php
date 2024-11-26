<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function Authenticate()
    {
        return view('Auth.Authentication');
    }

    public function LoginProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return redirect()->back()
                ->withErrors(['email' => trans('auth.failed')])
                ->withInput();
        }

        $request->session()->regenerate();

        // Check the user's role and redirect accordingly
        $user = Auth::user();
        if ($user->role == 'Dinas') {
            return redirect(route('DashboardDinas'));
        }

        return redirect(route('DashboardPetani')); // Default redirect to Petani dashboard
    }

    public function RegisterProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('Authenticate')
            ->with('success', 'Registration successful! Please login.');
    }

    public function Logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
