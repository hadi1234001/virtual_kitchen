<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class StateController extends Controller
{
    // عرض جميع الولايات
    public function index()
    {
        $states = State::all();
        return response()->json($states);
    }

    // إضافة ولاية جديدة
    public function store(Request $request)
    {
        try {
            // التحقق من المدخلات
            $validator = Validator::make($request->all(), [
                'state_name' => 'required|string|max:255'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'البيانات غير صحيحة',
                    'errors'  => $validator->errors()
                ], 400);
            }

            $state = State::create([
                'state_name' => $request->state_name,
            ]);

            return response()->json([
                'message' => 'تمت الإضافة بنجاح',
                'state'   => $state
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'حدث خطأ أثناء الإضافة',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    // عرض ولاية واحدة حسب ID
    public function show($id)
    {
        $state = State::find($id);

        if (!$state) {
            return response()->json(['message' => 'الولاية غير موجودة'], 404);
        }

        return response()->json($state);
    }

    // تحديث الولاية
    public function update(Request $request, $id)
    {
        try {
            $state = State::find($id);

            if (!$state) {
                return response()->json(['message' => 'الولاية غير موجودة'], 404);
            }

            $state->update([
                'state_name' => $request->state_name ?? $state->state_name,
            ]);

            return response()->json([
                'message' => 'تم التحديث بنجاح',
                'state'   => $state
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'حدث خطأ أثناء التحديث',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    // حذف الولاية
    public function destroy($id)
    {
        $state = State::find($id);
        if (!$state) {
            return response()->json(['message' => 'الولاية غير موجودة'], 404);
        }

        $state->delete();

        return response()->json(['message' => 'تم الحذف بنجاح']);
    }
}
