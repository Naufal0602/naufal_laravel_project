<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use Yajra\DataTables\Facades\DataTables;

class AdminProjectsController extends Controller
{
    // Menampilkan daftar project
    public function index()
    {
        $projects = Projects::all();
        return view('admin.projects.index', compact('projects'));
    }

    // Menampilkan form untuk menambah project baru
    public function create()
    {
        return view('admin.projects.create');
    }

    // Menyimpan project baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'link' => 'required|url',
            'issued_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);
    
        $data = $request->all();
    
        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('projects', 'public'); // Simpan gambar di folder `storage/app/public/projects`
            $data['image'] = $path;
        }
    
        Projects::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Projects berhasil ditambahkan.');
    }
    

    // Menampilkan detail sebuah project
    public function show($id)
    {
        $project = Projects::findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }

    // Menampilkan form untuk mengedit project yang ada
    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    // Memperbarui data project yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'link' => 'required|url',
            'issued_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $project = Projects::findOrFail($id);
        $data = $request->all();
    
        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($project->image && file_exists(storage_path('app/public/' . $project->image))) {
                unlink(storage_path('app/public/' . $project->image));
            }
    
            $file = $request->file('image');
            $path = $file->store('projects', 'public');
            $data['image'] = $path;
        }
    
        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Projects berhasil diperbarui.');
    }
    

    // Menghapus project
    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        
        $project->delete();
        
        return redirect()->route('admin.projects.index')->with('success', 'Projects berhasil dihapus.');
    }
}
