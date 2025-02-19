<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\FileCategory;
use Illuminate\Http\Request;

class StaffFileController extends Controller
{
    //
    public function index()
    {
        $categories = FileCategory::all();
        return view('staff.file.index', compact('categories'));
    }


    public function show($id)
    {
        $category = FileCategory::findOrFail($id);
        $files = File::where('file_category_id', $id)->get();

        return view('staff.file.show', compact('category', 'files'));
    }

    public function viewFile($id)
    {
        $file = File::findOrFail($id);
        return view('staff.file.view', compact('file'));
    }

    public function downloadFile($id)
    {
        $file = File::findOrFail($id);
        $path = storage_path('app/public/' . $file->file);

        if (!file_exists($path)) {
            abort(404, 'File not found');
        }

        // Ensure the filename has the correct extension
        $originalExtension = pathinfo($path, PATHINFO_EXTENSION);
        $customFileName = $file->file_name . '.' . $originalExtension;

        return response()->download($path, $customFileName);
    }
}
