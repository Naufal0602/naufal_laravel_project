<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;

class AdminCertificateController extends Controller
{
    // Display a listing of the Certificate entries
    public function index()
    {
        $certificate = Certificate::all(); // Fetch all Certificate entries
        return view('admin.certificates.index', compact('certificate')); // Send the $certificates data to the view
    }

    // Show the form for creating a new Certificate entry
    public function create()
    {
        return view('admin.certificate.create');
    }

    // Store a newly created Certificate entry
    public function store(Request $request)
{
    $request->validate([
        'certificates' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'nullable|string|max:255',
        'description' => 'required|string|max:255',
        'year' => 'required|string|max:255',
    ]);

    $certificate = new Certificate();

    if ($request->hasFile('certificates')) {
        $path = $request->file('certificates')->store('public/storage/img');
        $certificate->certificates = $path;
    }

    $certificate->name = $request->name;
    $certificate->description = $request->description;
    $certificate->year = $request->year;

    $certificate->save();

    return redirect()->route('admin.certificates.index')->with('success', 'Certificate successfully saved!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'certificates' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'nullable|string|max:255',
        'description' => 'required|string|max:255',
        'year' => 'required|string|max:255',
    ]);

    $certificate = Certificate::findOrFail($id);

    if ($request->hasFile('certificates')) {
        if ($certificate->certificates) {
            Storage::delete($certificate->certificates);
        }
        $path = $request->file('certificates')->store('public/img');
        $certificate->certificates = $path;
    }

    $certificate->name = $request->name;
    $certificate->description = $request->description;
    $certificate->year = $request->year;

    $certificate->save();

    return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully.');
}

public function delete_certificate($id)
{
    $certificate = Certificate::findOrFail($id);

    if ($certificate->certificates) {
        Storage::delete($certificate->certificates);
    }

    $certificate->delete();

    return redirect()->route('admin.certificates.index')->with('success', 'Certificate successfully deleted.');
}

}
