<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Auth;

class LoginStudentController extends Controller
{
    public function __construct() {
        $this->middleware('guest:student')->except('logout');
    }

    public function showLoginForm() {
        return view('auth.login-student');
    }

    public function login(Request $request) {
        
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $login = Student::where('std_username', $request->username)
                    ->where('std_password', md5($request->password))
                    ->first();

        if ($login) {
            
            Auth::guard('student')->login($login);

            return redirect()->route('home.student');
        }

        return back()->with('msg', 'These credentials do not match our records.');
    }

    public function logout() {
        Auth::guard('student')->logout();
        return redirect()->route('login.student');
    }
}
