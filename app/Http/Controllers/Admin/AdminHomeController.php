<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class AdminHomeController extends Controller
{
    // Display a listing of the Home entries
    public function index()
    {
        $home = Home::all(); // Fetch all home entries
        return view('admin.home.index', compact('home')); // Send the $home data to the view
         // Adjusted to 'home.index'
    }

    // Show the form for creating a new home entry
    public function create()
    {
        return view('admin.home.create'); // Adjusted to 'home.create'
    }

    // Store a newly created home entry
    public function submit_home(Request $request)
{
    $request->validate([
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'judul' => 'required|string|max:255',
        'sub_subjudul' => 'nullable|string|max:255',
        'work' => 'required|string|max:255',
        'sub_work' => 'nullable|string|max:255',
    ]);

    $home = new Home();
    if ($request->hasFile('img')) {
        $path = $request->file('img')->store('public/img', 'public');
        $home->img = $path;
    };
    
    $home->judul = $request->judul;
    $home->sub_subjudul = $request->sub_subjudul;
    $home->work = $request->work;
    $home->sub_work = $request->sub_work;

    $home->save();

    return redirect()->route('admin.home.index')->with('success', 'Home successfully saved!');
}

    // Show the form for editing the specified Home entry
    public function edit($id)
    {
        $home = Home::findOrFail($id);
        return view('admin.home.edit', compact('home')); // Adjusted to 'home.edit'
    }

    // Update the specified Home entry
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'sub_subjudul' => 'nullable|string|max:255',
            'work' => 'required|string|max:255',
            'sub_work' => 'nullable|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $home = Home::findOrFail($id);

        if ($request->hasFile('img')) {
          if ($home->img) {
                  Storage::delete('public/img/' . $home->img);
            }
            $imagePath = $request->file('img')->store('images', 'public');
            $home->img = $imagePath;
        }

        $home->judul = $request->input('judul');
        $home->sub_subjudul = $request->input('sub_subjudul');
        $home->work = $request->input('work');
        $home->sub_work = $request->input('sub_work');

        $home->save();

        return redirect()->route('admin.home.index')->with('success', 'Data updated successfully.');
    }

    // Remove the specified Home entry
    public function delete_home($id)
    {
        $home = Home::findOrFail($id); // Mengembalikan satu model, bukan collection

    
        if ($home->img) {
            Storage::delete('public/img/' . $home->img);
        }
    
        $home->delete();
    
        return redirect()->route('admin.home.index')->with('success', 'Data successfully deleted.');
    }
    
}
