<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MasterController extends Controller
{
    public function getLogin() {
        return view('auth.login');
    }

    public function loginAction(Request $request) {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }

    }

    public function getRegister() {
        return view('auth.register');
    }

    public function registerAction(Request $request) {

        $random_token = Str::random(10);
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'pin'      => $random_token
        ]);

        return redirect()->route('registerVerify');
    }

    public function registerVerify() {
        return view('auth.registerPinVerify');
    }

    public function registerVerifyAction(Request $request) {

        $isExist = User::where('pin', $request->pin)->first();

        if ($isExist) {
            $isExist->update(['pin_verify' => 1]);

            // $data = [
            //     'email'    => $isExist->email,
            //     'password' => $isExist->password
            // ];
            // if (Auth::attempt($data)) {
            if (Auth::loginUsingId($isExist->id)) {
                return redirect()->route('home');
            } else {
                return redirect()->back();
            }
        } else {
            $data['msg'] = 'Invalid Pin';
            return view('auth.registerPinVerify', $data);
        }

    }

    public function home() {
        return view('home');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
