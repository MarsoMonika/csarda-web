<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        if (
            $request->username === env('ADMIN_USERNAME') &&
            $request->password === env('ADMIN_PASSWORD')
        ) {
            session(['is_admin' => true]);
            return redirect()->route('admin');
        }

        return back()->withErrors(['password' => 'Hibás jelszó vagy felhasználónév.']);
    }
}
