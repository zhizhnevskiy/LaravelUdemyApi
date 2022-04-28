<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentsClass;
use Illuminate\Http\Request;

class StudentsClassController extends Controller
{
    public function Index()
    {
        $class = StudentsClass::query()
            ->orderBy('id')
            ->get();
        return response()->json($class);
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'class_name' => 'required|unique:students_classes|max:25'
        ]);

        StudentsClass::insert([
            'class_name' => $request->class_name,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);

        return response()->json([
            'result' => 1,
            'message' => 'Data inserted successfully',
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }

    public function Edit($id)
    {
        $class = StudentsClass::findOrFail($id);
        return response()->json([
            'result' => 1,
            'data' => $class,
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }

    public function Update(Request $request, $id)
    {
        StudentsClass::findOrFail($id)
            ->update([
                'class_name' => $request->class_name,
                'updated_at' => date('Y-m-d'),
            ]);
        return response()->json([
            'result' => 1,
            'message' => 'Data updated successfully',
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }

    public function Delete($id)
    {
        StudentsClass::findOrFail($id)->delete();
        return response()->json([
            'result' => 1,
            'message' => 'Data deleted successfully',
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }
}
