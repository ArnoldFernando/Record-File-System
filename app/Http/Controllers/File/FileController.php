<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\FileCategory;
use App\Models\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $files = File::with(['category', 'user'])->get();
        return view('admin.file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = FileCategory::all();
        return view('admin.file.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'file_name' => 'required|string|max:255',
        //     'location' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'file' => 'required|file|mimes:pdf,doc,docx,jpg,png',
        //     'civil_case_number' => 'required|string|max:255',
        //     'lot_number' => 'required|string|max:255',
        //     'path' => 'required|string|max:255',
        //     'status' => 'required|in:pending,approved,rejected,deleted',
        //     'file_category_id' => 'required|exists:file_categories,id',
        //     'user_id' => 'required|exists:users,id',
        // ]);

        // Upload the file
        $filePath = $request->file('file')->store('files', 'public');

        File::create([
            'file_name' => $request->file_name,
            'location' => $request->location,
            'description' => $request->description,
            'file' => $filePath,
            'civil_case_number' => $request->civil_case_number,
            'lot_number' => $request->lot_number,
            'path' => $request->path,
            'status' => $request->status,
            'file_category_id' => $request->file_category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('file.index')->with('success', 'File uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return view('admin.file.show', compact('file'));
    }

    public function edit($id)
    {
        $categories = FileCategory::all();
        $file = File::with(['category', 'user'])->find($id);
        return view('admin.file.edit', compact('file', 'categories'));
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



    public function update(Request $request, File $file)
    {
        // $request->validate([
        //     'file_name' => 'required|string|max:255',
        //     'location' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png',
        //     'civil_case_number' => 'required|string|max:255',
        //     'lot_number' => 'required|string|max:255',
        //     'path' => 'required|string|max:255',
        //     'status' => 'required|in:pending,approved,rejected,deleted',
        //     'file_category_id' => 'required|exists:file_categories,id',
        //     'user_id' => auth()->id(),
        // ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('files', 'public');
            $file->file = $filePath;
        }

        $file->update($request->except(['file']));

        return redirect()->route('file.index')->with('success', 'File updated successfully');
    }

    public function destroy(File $file)
    {
        $file->delete();
        return redirect()->route('file.index')->with('success', 'File deleted successfully');
    }
}
