<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
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
                if (!Auth::User()->email_verified_at) {
                    toastr()->error('Please verify your email.');
                    Auth::logout();
                    return redirect()->route('admin.login.index');
                }
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

    public function verification($token)
    {
        $tokenExists = User::where('verification_token', $token)->first();
        if ($tokenExists) {
            $tokenExists->update([
                'email_verified_at' => Carbon::now(),
                'verification_token' => null
            ]);
            toastr()->success('User verified Succesfully.');
        } else {
            toastr()->error('Invalid Token.');
        }
        return redirect()->route('admin.login.index');
    }
}
