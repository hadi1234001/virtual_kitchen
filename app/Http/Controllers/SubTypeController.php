<?php

namespace App\Http\Controllers;

use App\Models\SubType;
use Illuminate\Http\Request;
use Exception;

class SubTypeController extends Controller
{
    // عرض جميع الأنواع الفرعية
    public function index()
    {
        try {
            return response()->json(SubType::all());
        } catch (Exception $e) {
            return response()->json(['message'=>'حدث خطأ','error'=>$e->getMessage()],500);
        }
    }

    // إضافة نوع فرعي
    public function store(Request $request)
    {
        try {
            $request->validate([
                'sub_type_name' => 'required|string|max:255',
                'type_id'       => 'required|integer|exists:types,type_id'
            ]);

            $subType = SubType::create([
                'sub_type_name' => $request->sub_type_name,
                'type_id'       => $request->type_id
            ]);

            return response()->json(['message' => 'تمت الإضافة بنجاح','subType'=>$subType]);
        } catch (Exception $e) {
            return response()->json(['message'=>'حدث خطأ أثناء الإضافة','error'=>$e->getMessage()],500);
        }
    }

    // عرض نوع فرعي واحد
    public function show($id)
    {
        try {
            $subType = SubType::findOrFail($id);
            return response()->json($subType);
        } catch (Exception $e) {
            return response()->json(['message'=>'غير موجود أو حدث خطأ','error'=>$e->getMessage()],404);
        }
    }

    // تعديل نوع فرعي
    public function update(Request $request, $id)
    {
        try {
            $subType = SubType::findOrFail($id);
            $subType->update([
                'sub_type_name' => $request->sub_type_name ?? $subType->sub_type_name
            ]);
            return response()->json(['message'=>'تم التعديل بنجاح','subType'=>$subType]);
        } catch (Exception $e) {
            return response()->json(['message'=>'حدث خطأ أثناء التعديل','error'=>$e->getMessage()],500);
        }
    }

    // حذف
    public function destroy($id)
    {
        try {
            $subType = SubType::findOrFail($id);
            $subType->delete();
            return response()->json(['message'=>'تم الحذف بنجاح']);
        } catch (Exception $e) {
            return response()->json(['message'=>'حدث خطأ أثناء الحذف','error'=>$e->getMessage()],500);
        }
    }

    public function getPlates($id)
    {
        try {
            $subType = SubType::with('plates')->findOrFail($id);
            return response()->json($subType->plates);
        } catch (Exception $e) {
            return response()->json(['message'=>'حدث خطأ أو النوع الفرعي غير موجود','error'=>$e->getMessage()],404);
        }
    }
}
