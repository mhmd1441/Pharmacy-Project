<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Medicines;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
    public function create()
    {
        return view('clients.create');
    }

    public function index()
    {
        $clients = Clients::all();
        return view('clients.index', compact('clients'));
    }




    public function showSignupForm(): View
    {
        return view('signInPage');
    }

    public function showLoginForm(): View
    {
        return view('loginPage');
    }

    public function signup(Request $request)
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

        $client = Clients::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dateOfBirth' => $request->dateOfBirth,
            'allergies' => $request->allergies,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($client));

        return redirect()->route('auth.login')->with('success', 'Registration successful! Please login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = Clients::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        session(['client_id' => $user->id]);
        session(['client_email' => $user->email]);
        if ($user)

            return redirect()->route('clientPage');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')->with([
            'message' => 'You have been logged out successfully.',
            'title' => 'Logout Successful !',
        ]);
    }
    public function fetchAllClients()
    {
        $clients = Clients::all();
        return view('admin.viewClient', compact('clients'));
    }
    public function add(Request $request, Medicines $medicine)
    {
        $cart = session()->get('cart', []);

        //Am chayik If hiye bel cart to increment else zida
        if (isset($cart[$medicine->id])) {
            $cart[$medicine->id]['quantity']++;
        } else {
            $cart[$medicine->id] = [
                "name" => $medicine->medicine_name,
                "quantity" => 1,
                "price" => $medicine->price,
                "image" => $medicine->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Medicine added to cart successfully!');
    }
    public function show(Medicines $medicine)
    {
        return view('medicines.show', compact('medicine'));
    }
}
