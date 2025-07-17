<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        // if (Auth::check()) {
        //     return redirect()->route('admin.dashboard.index');
        // }
        return view('admin.login.index');
    }

    public function check(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                toastr()->warning('Please check your form and try again!');
                return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validator->errors());
            }

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                toastr()->success('Login Success.');
                return redirect()->route('admin.dashboard.index');
            } else {
                toastr()->error('Invalid credentials given.');
                return redirect()->back()->withInput($request->input());
            }
        } catch (Throwable $e) {
            toastr()->error($e->getMessage());
            return redirect()->back()->withInput($request->input());
        }
    }
}
