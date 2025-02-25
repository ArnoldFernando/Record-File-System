<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class ProcessFileController extends Controller
{
    //

    public function updateStatus(Request $request, $fileId)
    {
        // Validate the request
        // $request->validate([
        //     'status' => 'required|in:pending,rejected,approved',
        // ]);

        // Find the file by ID
        $file = File::findOrFail($fileId);

        // Update the status
        $file->status = $request->input('status');
        $file->save();

        // Return a response
        return redirect()->back()->with('success', 'File status updated successfully.');
    }
}
