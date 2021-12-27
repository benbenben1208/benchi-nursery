<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function login(Request $request)
    {

        // dd(Admin::all()->toArray());
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);



        if (Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'admin' =>  auth()->guard('admins')->user(),
                'message' => "管理者ログインに成功しました"
             ]);

         }
         return response()->json([
            'message' => '管理者ログイン失敗しました'
        ], 401);


    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(true);
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191|unique:admins,email',
            'password' => 'required|string'
        ]);

        $user = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);


        // ユーザー登録テスト用
        // return response($user, 201);



        return response($user, 201);
    }
    public function index()
    {
        $user = Admin::orderBy('id', 'desc')->get();
        return response()->json($user, 200);
    }

}
