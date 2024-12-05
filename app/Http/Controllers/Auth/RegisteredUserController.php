<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $checkEmail = User::where('email', $request->email)->first();
        if ($checkEmail) {
            if ($checkEmail->status == 1) {
                return redirect()->back()->with('info', 'Your email has been registered, please login');
            }
            return redirect()->back()->with('info', 'Your email has been registered, if you are a trusted user please contact our team to activate your account');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('admin');

        event(new Registered($user));
        if ($user->status == 1) {
            Auth::login($user);

            return redirect(route('dashboard', absolute: false));
        }

        return redirect()->back()->with('success', 'Thank you for registering. Your account has been successfully registered. Your account needs to be activated by our admin team.');
    }
}
