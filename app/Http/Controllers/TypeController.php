<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Exception;

class TypeController extends Controller
{
    // عرض جميع الأنواع
    public function index()
    {
        try {
            return response()->json(Type::all());
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ', 'error' => $e->getMessage()], 500);
        }
    }

    // إضافة نوع جديد
    public function store(Request $request)
    {
        try {
            $request->validate([
                'type_name' => 'required|string|max:255'
            ]);

            $type = Type::create([
                'type_name' => $request->type_name
            ]);

            return response()->json(['message' => 'تمت الإضافة بنجاح', 'type' => $type]);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء الإضافة', 'error' => $e->getMessage()], 500);
        }
    }

    // عرض نوع واحد
    public function show($id)
    {
        try {
            $type = Type::findOrFail($id);
            return response()->json($type);
        } catch (Exception $e) {
            return response()->json(['message' => 'البيان غير موجود أو حدث خطأ', 'error' => $e->getMessage()], 404);
        }
    }

    // تعديل نوع
    public function update(Request $request, $id)
    {
        try {
            $type = Type::findOrFail($id);
            $type->update([
                'type_name' => $request->type_name ?? $type->type_name
            ]);
            return response()->json(['message' => 'تم التعديل بنجاح', 'type' => $type]);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء التعديل', 'error' => $e->getMessage()], 500);
        }
    }

    // حذف نوع
    public function destroy($id)
    {
        try {
            $type = Type::findOrFail($id);
            $type->delete();
            return response()->json(['message' => 'تم الحذف بنجاح']);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء الحذف', 'error' => $e->getMessage()], 500);
        }
    }

    public function getSubTypes($id)
    {
        try {
            $type = Type::with('subTypes')->findOrFail($id);
            return response()->json($type->subTypes);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أو النوع غير موجود', 'error' => $e->getMessage()], 404);
        }
    }
}
