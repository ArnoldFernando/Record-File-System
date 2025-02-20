<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($status)
    {
        $files = File::where('status', $status)
            ->with('category') // Make sure the relationship is defined in the File model
            ->get()
            ->groupBy(function ($file) {
                return $file->category->name ?? 'Uncategorized';
            });


        return view('staff.file.status.index', compact('files', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
