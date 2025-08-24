<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Exception;

class VehicleController extends Controller
{
    // جلب جميع أنواع المركبات
    public function index()
    {
        try {
            return response()->json(Vehicle::all());
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ', 'error' => $e->getMessage()], 500);
        }
    }

    // إضافة مركبة
    public function store(Request $request)
    {
        try {
            $request->validate([
                'vehicle_name' => 'required|string|max:255'
            ]);

            $vehicle = Vehicle::create([
                'vehicle_name' => $request->vehicle_name
            ]);

            return response()->json(['message' => 'تمت الإضافة بنجاح', 'vehicle' => $vehicle]);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء الإضافة', 'error' => $e->getMessage()], 500);
        }
    }

    // جلب مركبة واحدة
    public function show($id)
    {
        try {
            $vehicle = Vehicle::findOrFail($id);
            return response()->json($vehicle);
        } catch (Exception $e) {
            return response()->json(['message' => 'المركبة غير موجودة', 'error'=>$e->getMessage()], 404);
        }
    }

    // تعديل مركبة
    public function update(Request $request, $id)
    {
        try {
            $vehicle = Vehicle::findOrFail($id);
            $vehicle->update([
                'vehicle_name' => $request->vehicle_name ?? $vehicle->vehicle_name
            ]);
            return response()->json(['message' => 'تم التعديل بنجاح', 'vehicle' => $vehicle]);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء التعديل','error'=>$e->getMessage()], 500);
        }
    }

    // حذف مركبة
    public function destroy($id)
    {
        try {
            $vehicle = Vehicle::findOrFail($id);
            $vehicle->delete();
            return response()->json(['message' => 'تم الحذف بنجاح']);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء الحذف','error'=>$e->getMessage()], 500);
        }
    }
}
