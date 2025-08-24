<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdminController extends Controller
{
    // ﺗﺴﺠﻴﻞ اﻟﺪﺧﻮﻝ
    public function login(Request $request)
    {
        try {

            $credentials = $request->only('user_name', 'password');

            if (! $token = Auth::guard('api_admins')->attempt($credentials)) {
                return response()->json(['message' => 'بيانات الدخول غير صحيحة'], 401);
            }

            return response()->json([
                'token' => $token,
                'token_type' => 'bearer'
            ]);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ', 'error' => $e->getMessage()], 500);
        }
    }

    // تسجيل الخروج
    public function logout()
    {
        try {
            Auth::guard('api_admins')->logout();
            return response()->json(['message' => 'تم تسجيل الخروج بنجاح']);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء تسجيل الخروج', 'error' => $e->getMessage()], 500);
        }
    }

    // عرض معلومات الادمن
    public function me()
    {
        try {
            $admin = Auth::guard('api_admins')->user();
            return response()->json($admin);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ', 'error' => $e->getMessage()], 500);
        }
    }

    // تعديل بيانات الادمن
    public function update(Request $request)
    {
        try {
            $admin = Auth::guard('api_admins')->user();
            /** @var \App\Models\Admin $admin */
            $admin->update([
                'user_name' => $request->user_name ?? $admin->user_name,
                'password'  => $request->password ? Hash::make($request->password) : $admin->password
            ]);

            return response()->json(['message' => 'تم التحديث بنجاح', 'admin' => $admin]);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء التحديث', 'error' => $e->getMessage()], 500);
        }
    }
}
