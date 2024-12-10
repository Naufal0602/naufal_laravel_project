<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class AdminCertificateController extends Controller
{
    // Display a listing of the Home entries
    public function index()
    {
        $Certificate = certificate::all(); // Fetch allCertificatentries
        return view('admin.certificate.index', compact('certificate')); // Send the $home data to the view
         // Adjusted to 'home.index'
    }

    // Show the form for creating a new home entry
    public function create()
    {
        return view('admin.certificate.index'); // Adjusted to 'home.create'
    }

    // Store a newly created home entry
    public function submit_home(Request $request)
{
    $request->validate([
        'certificates' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'nullable|string|max:255',
        'description' => 'required|string|max:255',
        'year' => 'required|string|max:255',
    ]);

    $certificate = new certificate();
    if ($request->hasFile('certificates')) {
        $path = $request->file('img')->store('img', 'public');
        $certificate->certificates = $path;
    };
    
    $certificate->name = $request->name;
    $certificate->description = $request->description;
    $certificate->year = $request->year;

    $certificate->save();

    return redirect()->route('admin.certificate.index')->with('success', 'Home successfully saved!');
}

    // Show the form for editing the specified Home entry
    public function edit($id)
    {
        $certificates = certificate::findOrFail($id);
        return view('admin.certificates.edit', compact('certificate')); // Adjusted to 'home.edit'
    }

    // Update the specified Home entry
    public function update(Request $request, $id)
    {
        $request->validate([
            'certificates' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'nullable|string|max:255',
            'description' => 'required|string|max:255',
            'year' => 'required|string|max:255',
        ]);

        $certificate = certificate::findOrFail($id);

        if ($request->hasFile('img')) {
          if ($certificate->img) {
                  Storage::delete('public/img/' . $certificate->img);
            }
            $imagePath = $request->file('img')->store('images', 'public');
            $certificate->img = $imagePath;
        }

        $certificate->judul = $request->input('judul');
        $certificate->sub_subjudul = $request->input('sub_subjudul');
        $certificate->work = $request->input('work');
        $certificate->sub_work = $request->input('sub_work');

        $certificate->save();

        return redirect()->route('admin.certificates.index')->with('success', 'Data updated successfully.');
    }

    // Remove the specified Home entry
    public function delete_home($id)
    {
        $certificates = certificate::findOrFail($id); // Mengembalikan satu model, bukan collection

    
        if ($certificates->img) {
            Storage::delete('public/img/' . $certificates->img);
        }
    
        $certificates->delete();
    
        return redirect()->route('admin.certificates.index')->with('success', 'Data successfully deleted.');
    }
    
}
