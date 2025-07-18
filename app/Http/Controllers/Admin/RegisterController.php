<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\RegistrationEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard.index');
        }
        return view('admin.register.index');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                toastr()->warning('Please check your form and try again!');
                return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validator->errors());
            }
            $data = $request->all();
            $data['verification_token'] = Str::random(50);
            User::create($data);

            $data = [
                'name' => $request->name,
                'token' => $data['verification_token']
            ];

            Mail::to($request->email)->send(new RegistrationEmail($data));

            toastr()->success('Registration Success.');
            DB::commit();
            return redirect()->route('admin.login.index');
        } catch (Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
        }
    }
}
