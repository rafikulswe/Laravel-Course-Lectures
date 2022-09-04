<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::get();
        return view('admin.user.listData', $data);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->back();
    }
}
