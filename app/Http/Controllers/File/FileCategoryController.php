<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Models\FileCategory;
use Illuminate\Http\Request;

class FileCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filecategories = FileCategory::all();
        return view('admin.file-category.index', compact('filecategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $filecategories = FileCategory::all();

        return view('admin.file-category.create', compact('filecategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $fileCategory = new FileCategory();
        $fileCategory->name = $request->input('name');
        $fileCategory->description = $request->input('description');
        $fileCategory->save();

        return redirect()->route('file-category.index')->with('success', 'File category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = FileCategory::find($id);
        return view('admin.file-category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $fileCategory = FileCategory::find($id);
        $fileCategory->name = $request->input('name');
        $fileCategory->description = $request->input('description');
        $fileCategory->save();

        return redirect()->route('file-category.index')->with('success', 'File category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $fileCategory = FileCategory::find($id);
        $fileCategory->delete();

        return redirect()->route('file-category.index')->with('success', 'File category deleted successfully.');
    }
}
