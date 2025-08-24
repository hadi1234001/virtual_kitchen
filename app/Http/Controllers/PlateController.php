<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class PlateController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Plate::with(['subType', 'chef'])->get());
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'plate_name'   => 'required|string|max:255',
                'description'  => 'required|string',
                'sub_type_id'  => 'nullable|exists:sub_types,sub_type_id',
                'chef_id'      => 'nullable|exists:chefs,chef_id',
                'photo'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('photo')) {
                $response = Http::attach(
                    'image',
                    file_get_contents($request->photo),
                    $request->photo->getClientOriginalName()
                )->post('http://127.0.0.1:5002/check_food');

                if (!$response->json('is_food')) {
                    return response()->json(['message' => 'الصورة المرسلة ليست صورة طبق.'], 422);
                }

                $photoName = time() . '.' . $request->photo->extension();
                $request->photo->storeAs('plates_photo', $photoName, 'public');
            }

            $plate = Plate::create([
                'plate_name'  => $request->plate_name,
                'description' => $request->description,
                'photo_path'  => $photoName ?? null,
                'sub_type_id' => $request->sub_type_id,
                'chef_id'     => $request->chef_id
            ]);

            return response()->json(['message' => 'تم إنشاء الطبق بنجاح', 'plate' => $plate]);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء الإضافة', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $plate = Plate::with(['subType', 'chef', 'prices', 'plateIngredients.ingredient'])->findOrFail($id);

            $ordersCount = $plate->orderPlates()->count();

            $averageRate = $plate->orderPlates()->whereNotNull('rate')->avg('rate');

            return response()->json([
                'plate'         => $plate,
                'orders_count'  => $ordersCount,
                'average_rate'  => $averageRate,
            ]);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أو الطبق غير موجود', 'error' => $e->getMessage()], 404);
        }
    }

    // تعديل طبق
    public function update(Request $request, $id)
    {
        try {
            $plate = Plate::findOrFail($id);

            if ($request->hasFile('photo')) {
                $response = Http::attach(
                    'image',
                    file_get_contents($request->photo),
                    $request->photo->getClientOriginalName()
                )->post('http://127.0.0.1:5002/check_food');

                if (!$response->json('is_food')) {
                    return response()->json(['message' => 'الصورة المرسلة ليست صورة طبق.'], 422);
                }

                $photoName = time() . '.' . $request->photo->extension();
                $request->photo->storeAs('plates_photo', $photoName, 'public');
                $plate->photo_path = $photoName;
            }

            $plate->plate_name  = $request->plate_name  ?? $plate->plate_name;
            $plate->description = $request->description ?? $plate->description;
            $plate->sub_type_id = $request->sub_type_id ?? $plate->sub_type_id;
            $plate->chef_id     = $request->chef_id     ?? $plate->chef_id;
            $plate->save();

            return response()->json(['message' => 'تم التعديل بنجاح', 'plate' => $plate]);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء التعديل', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $plate = Plate::findOrFail($id);
            $plate->delete();
            return response()->json(['message' => 'تم الحذف بنجاح']);
        } catch (Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء الحذف', 'error' => $e->getMessage()], 500);
        }
    }
}
