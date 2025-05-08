<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class ClientController extends Controller
{
    public function showSignupForm(): View
    {
        return view('signInPage');
    }

    public function showLoginForm(): View
    {
        return view('loginPage');
    }

    public function signup(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:clients',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'dateOfBirth' => 'required|date',
            'email' => 'required|email|max:50|unique:clients',
            'mobile_number' => 'required|string|max:20|unique:clients',
            'password' => 'required|string|min:8|confirmed',
            'allergies' => 'nullable|string|max:100',
        ]);

        $client = new Clients();
        $client->username = $request->username;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->dateOfBirth = $request->dateOfBirth;
        $client->allergies = $request->allergies;
        $client->email = $request->email;
        $client->mobile_number = $request->mobile_number;
        $client->password = Hash::make($request->password);
        $client->save();

        event(new Registered($client));

        return redirect()->route('loginPage')->with('success', 'Registration successful! Please login.');
    }
    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
        }
        return back()->withErrors([
            'email' => 'Email and password combination did not match.',
        ]);
    }
}
