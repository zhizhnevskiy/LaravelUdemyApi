<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentsClass;
use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function Index()
    {
        $class = Subjects::query()
            ->orderBy('id')
            ->get();
        return response()->json($class);
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'nullable',
        ]);

        Subjects::insert([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);

        return response()->json([
            'result' => 1,
            'message' => 'Subject inserted successfully',
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }

    public function Edit($id)
    {
        $subject = Subjects::findOrFail($id);
        return response()->json([
            'result' => 1,
            'data' => $subject,
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }

    public function Update(Request $request, $id)
    {
        Subjects::findOrFail($id)
            ->update([
                'class_id' => $request->class_id,
                'subject_name' => $request->subject_name,
                'subject_code' => $request->subject_code,
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
        Subjects::findOrFail($id)->delete();
        return response()->json([
            'result' => 1,
            'message' => 'Data deleted successfully',
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }
}
