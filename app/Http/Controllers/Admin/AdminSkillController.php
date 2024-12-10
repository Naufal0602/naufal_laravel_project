<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Storage;

class AdminSkillController extends Controller
{
    /**
     * Display a listing of the resource with DataTables.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Menangkap input pencarian
        $skills = Skill::query();

        // Jika ada pencarian, filter berdasarkan judul
        if ($search) {
            $skills->where('title', 'LIKE', "%{$search}%");
        }

        $skills = $skills->get(); // Ambil data skill yang sudah difilter

        return view('admin.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'integer|nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('skills', 'public'); // Simpan file gambar
        }

        Skill::create($validatedData);

        return redirect()->route('admin.skill.index')->with('success', 'Skill successfully saved!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'integer|nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($skill->image) {
                Storage::disk('public')->delete($skill->image);
            }
            $validatedData['image'] = $request->file('image')->store('skills', 'public');
        }

        $skill->update($validatedData);

        return redirect()->route('admin.skill.index')->with('success', 'Skill successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);

        // Hapus gambar jika ada
        if ($skill->image) {
            Storage::disk('public')->delete($skill->image);
        }

        $skill->delete();

        return redirect()->route('admin.skill.index')->with('success', 'Skill successfully deleted!');
    }
}
