<?php

namespace App\Http\Controllers;

use App\Models\Admin_about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Admin_aboutController extends Controller
{
    // Menampilkan data "about"
    public function index()
    {
        $about = Admin_about::get();
        return view('admin.about', compact('about')); 
    }

    // Form tambah "about"
    function tambah_about(){
        return view('admin.tambah_about');
    }

    // Menangani form submit "about"
    public function submit_about(Request $request)
{
    // Validasi input
    $request->validate([
        'judul' => 'required|string|max:255',
        'sub_subjudul' => 'nullable|string|max:255',
        'work' => 'required|string|max:255',
        'sub_work' => 'nullable|string|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi untuk logo
    ]);

    // Simpan data ke database
    $data = $request->only(['judul', 'sub_subjudul', 'work', 'sub_work']);

    // Handle file upload untuk gambar (img)
    if ($request->hasFile('img')) {
        $data['img'] = $request->file('img')->store('img_about', 'public');
    }

    // Handle file upload untuk logo
    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('logo_about', 'public');
    }

    // Buat data baru di tabel Admin_about
    Admin_about::create($data);

    return redirect('/admin/about')->with('success', 'About successfully saved!');
}

    // Form edit "about"
    public function edit_about($id)
    {
        // Cari data berdasarkan id
        $about = Admin_about::findOrFail($id);

        // Return view dengan data "about"
        return view('admin.edit_about', compact('about'));
    }

    // Menangani update data "about"
    public function update_about(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'judul' => 'required|string|max:255',
        'sub_subjudul' => 'nullable|string|max:255',
        'work' => 'required|string|max:255',
        'sub_work' => 'nullable|string|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi untuk logo
    ]);

    // Cari data yang akan diupdate
    $about = Admin_about::findOrFail($id);

    // Jika ada gambar baru (img), hapus yang lama dan simpan yang baru
    if ($request->hasFile('img')) {
        if ($about->img && Storage::exists($about->img)) {
            Storage::delete($about->img);
        }

        $about->img = $request->file('img')->store('img_about', 'public');
    }

    // Jika ada logo baru, hapus yang lama dan simpan yang baru
    if ($request->hasFile('logo')) {
        if ($about->logo && Storage::exists($about->logo)) {
            Storage::delete($about->logo);
        }

        $about->logo = $request->file('logo')->store('logo_about', 'public');
    }

    // Update data lainnya
    $about->judul = $request->input('judul');
    $about->sub_subjudul = $request->input('sub_subjudul');
    $about->work = $request->input('work');
    $about->sub_work = $request->input('sub_work');

    // Simpan perubahan
    $about->save();

    return redirect()->route('admin_about')->with('success', 'Data updated successfully.');
}

    

    // Menghapus data "about" beserta gambar
    public function delete_about($id)
{
    $about = Admin_about::findOrFail($id);

    // Hapus file gambar jika ada
    if ($about->img && Storage::exists($about->img)) {
        Storage::delete($about->img);
    }

    // Hapus data dari database
    $about->delete();

    return redirect()->route('admin_about')->with('success', 'Data successfully deleted.');
}

}
