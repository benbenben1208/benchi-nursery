<?php

namespace App\Http\Controllers\Api\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
use Carbon\Carbon;

class StaffController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);



        if (Auth::guard('staffs')->attempt($credentials)) {
            $request->session()->regenerate();


            return response()->json([
                'staff' =>  auth()->guard('staffs')->user(),
                'message' => "スタッフログインに成功しました"
             ]);

         }
         return response()->json([
            'message' => 'スタッフログイン失敗しました'
        ], 401);


    }
    public function getAuthStaff()
    {
        $staff = Staff::findOrFail(Auth::guard('staffs')->id());
        return [$staff, 200];
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(true);
    }
    public function register(StaffRequest $request, Staff $staff)
    {
        $staff->create($request->validated() + ['date_joined' => Carbon::now()]);

        return response($staff , 201);
    }
    public function index()
    {
        $user = Staff::orderBy('id', 'desc')->get();
        return response()->json($user, 200);
    }
}
