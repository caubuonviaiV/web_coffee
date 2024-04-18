<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function createCustomer() {
        $user = new User();
        $user->name = 'Adm1n';
        $user->email = 'admin1@gmail.com';
        $user->password =  Hash::make('123');
        $user->save();

        $admin = Role::where('slug', 'admin')->first();
        $user->roles()->attach($admin);
    }

    public function get_login() {
        return view('auth.signIn');
     }
    public function post_login(Request $request) {
        $validation = Validator::make($request->all(), [
            'email' => 'required|string|email:filter|exists:users, email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ Email!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validation->errors()->first()
            ]);
        }
        else {
            $cred = array(
                'email' => $request->email,
                'password' => $request->password,
            );

            if (Auth::attempt($cred, false)) {
                if(Auth::User()->hasRole('admin')) {

                }
                return response()->json([
                    'success' => 1,
                    'message' => 'Chào mừng '. Auth::user()->name,
                    'user' => Auth::user()
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'wrong cred'
                ]);
            }
        }


        // return response()->json(['error' => $validation->errors()->first()]);

    }

    //  public function loginAjaxHandle(Request $request) {
    //     $validation = Validator::make($request->all(), [
    //         'email' => 'required|email:filter|exists:users',
    //         'password' => 'required',
    //     ], [
    //         'email.required' => 'Vui lòng nhập địa chỉ Email!',
    //         'password.required' => 'Vui lòng nhập mật khẩu!',
    //     ]);

    //     if ($validation->fails()) {
    //         return response()->json(['error' => $validation->errors()->first()]);
    //     }
    //     else {
    //         if (Auth::attempt([
    //             'email' => $request->input('email'),
    //             'password' => $request->input('password'),
    //             'active' => 1
    //         ])) {
    //             return response()->json([
    //                 'success' => 1,
    //                 'message' => 'Chào mừng '. Auth::user()->name,
    //                 'user' => Auth::user()
    //             ]);
    //         } elseif(Auth::attempt([
    //             'email' => $request->input('email'),
    //             'password' => $request->input('password'),
    //             'active' => 0
    //         ])) {
    //             Auth::logout();
    //             return response()->json([
    //                 'error' => 0,
    //                 'message' => 'Tài khoản của bạn đã bạn khóa hoặc chưa kích hoạt'
    //             ]);
    //         }
    //     }

    //     return response()->json(['error' => $validation->errors()->first()]);

    // }
}
