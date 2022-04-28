<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\StudentsClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function Index()
    {
        $class = Section::query()
            ->orderBy('id')
            ->get();
        return response()->json($class);
    }

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required|unique:sections|max:25',
            'section_name' => 'required|unique:sections|max:25'
        ]);

        Section::insert([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return response()->json([
            'result' => 1,
            'message' => 'Section inserted successfully',
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }

    public function Edit($id)
    {
        $section = Section::findOrFail($id);
        return response()->json([
            'result' => 1,
            'data' => $section,
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }

    public function Update(Request $request, $id)
    {
        Section::findOrFail($id)
            ->update([
                'class_id' => $request->class_id,
                'section_name' => $request->section_name,
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
        Section::findOrFail($id)->delete();
        return response()->json([
            'result' => 1,
            'message' => 'Data deleted successfully',
            'date_time' => date('Y-m-d H:i'),
        ], 200);
    }
}
