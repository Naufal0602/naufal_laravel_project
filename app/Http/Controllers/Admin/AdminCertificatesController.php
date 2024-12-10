<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificates;
use Illuminate\Support\Facades\Storage;

class AdminCertificatesController extends Controller
{
    
    public function index()
    {
        $certificates = Certificates::all();
        return view('admin.certificates.index', compact('certificates'));
    }

    
    public function create()
    {
        return view('admin.certificates.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'issued_by' => 'required|string|max:255',
            'issued_at' => 'required|date',
            'file' => 'nullable|file|mimes:pdf',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);
    
        $data = $request->all();
    
        // Handle PDF upload if provided
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('certificates/files', 'public');
        }
    
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificates/images', 'public');
        }
    
        Certificates::create($data);
    
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate added successfully!');
    }
    
    
    public function edit(string $id)
    {
        $certificate = Certificates::findOrFail($id);
        return view('admin.certificates.edit', compact('certificate'));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'issued_by' => 'required|string|max:255',
            'issued_at' => 'required|date',
            'file' => 'nullable|file|mimes:pdf',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);
    
        $certificate = Certificates::findOrFail($id);
        $data = $request->all();
    
        // Update PDF file if provided
        if ($request->hasFile('file')) {
            if ($certificate->file) {
                Storage::disk('public')->delete($certificate->file);
            }
            $data['file'] = $request->file('file')->store('certificates/files', 'public');
        }
    
        // Update image file if provided
        if ($request->hasFile('image')) {
            if ($certificate->image) {
                Storage::disk('public')->delete($certificate->image);
            }
            $data['image'] = $request->file('image')->store('certificates/images', 'public');
        }
    
        $certificate->update($data);
    
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully!');
    }
    

 
    public function destroy(string $id)
    {
        $certificate = Certificates::findOrFail($id);

        if ($certificate->file) {
            Storage::disk('public')->delete($certificate->file);
        }

        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully!');
    }
}
