<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $defaultFields = [
            'name' => null,
            'phone' => null,
            'address' => null,
            'role' => 'user',
        ];

        $incomingFields = array_merge($defaultFields, $request->all());

        try {
            $validatedFields = $request->validate([
                'name' => 'nullable|string|max:255',
                'email' => ['required', Rule::unique('users', 'email')],
                'password' => ['required'],
                'phone' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
                'role' => 'nullable|string|max:255',
            ]);

            $incomingFields = array_merge($validatedFields, $defaultFields);

            $incomingFields['password'] = bcrypt($incomingFields['password']);

            User::create($incomingFields);

            return redirect('/login')->with('success', 'Registration successful!');
        } catch (Exception $e) {
            Log::error('Registration failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error',$e->getMessage() );
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginEmail' => 'required',
            'loginPassword' => 'required',
        ]);

        if (auth()->attempt(['email' => $incomingFields['loginEmail'], 'password' => $incomingFields['loginPassword']])) {
            return redirect('/');
        } else {
            return redirect()->back()->withErrors(['loginEmail' => 'Invalid credentials provided']);
        }
    }

    public function update(Request $request)
    {
        $incomingFields = $request->validate([
            'name'=>'required|string',
            'phone'=>'required|string',
            'address'=>'required|string',
        ]);

        $user = User::find(auth()->id());

        $user->update([
            'name'=>$incomingFields['name'],
            'phone'=>$incomingFields['phone'],
            'address'=>$incomingFields['address'],
        ]);

        return redirect('/profile');
    }
}
