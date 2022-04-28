<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Students;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function Index()
    {
        $students = Students::query()
            ->orderBy('id')
            ->get();
        return response()->json($students);
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required|unique:students|max:25',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:students|max:25',
            'password' => 'required',
            'photo' => 'nullable',
            'gender' => 'nullable'
        ]);

        Students::insert([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return response()->json([
            'result' => 1,
            'message' => 'Students inserted successfully',
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }

    public function Edit($id)
    {
        $student = Students::findOrFail($id);
        return response()->json([
            'result' => 1,
            'data' => $student,
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }

    public function Update(Request $request, $id)
    {
        Students::findOrFail($id)
            ->update([
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $request->photo,
                'gender' => $request->gender,
                'updated_at' => Carbon::now()
            ]);
        return response()->json([
            'result' => 1,
            'message' => 'Data updated successfully',
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }

    public function Delete($id)
    {
        Students::findOrFail($id)->delete();
        return response()->json([
            'result' => 1,
            'message' => 'Data deleted successfully',
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }
}
