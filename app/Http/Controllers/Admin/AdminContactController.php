<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = contact::all(); // Fetch all Certificate entries
        return view('admin.contact.index', compact('contact'));
    }

    
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'string',
            'mail' => 'string|nullable',
            
        ]);
    
        // 2. Simpan Data ke Database
        $contact = new contact();
    
        
    
        // Isi field lain dari input yang tervalidasi
        $contact->name = $validatedData['name'];  // Isi kolom title
        $contact->email = $validatedData['email'] ?? null;
        $contact->mail = $validatedData['mail'] ?? null; 
    
        // Simpan data ke database
        $contact->save();
    
        // 3. Redirect dengan Pesan Sukses
        return redirect('/admin/contact')->with('success', 'About successfully saved!');
    }

    /**
     * Display the specified resource.
     */
    

    
    public function edit(string $id)
    {
        $contact = contact::findOrFail($id);

    return view('admin.contact.edit', compact('contact'));
    }

    public function show($id)
{
    $contact = Contact::findOrFail($id); // Ambil data certificate berdasarkan ID
    return view('admin.contact.show', compact('contact')); // Tampilkan view untuk detail certificate
}

    /**
     * Update the specified resource in storage.
     */
  
     public function update(Request $request, $id)
     {
         // Validasi data
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:contact,email,' . $id,
             'mail' => 'required|string|max:255',
         ]);
     
         // Update data kontak
         try {
             $contact = Contact::findOrFail($id);
             $contact->update($validated);
             
             return response()->json(['success' => 'Kontak berhasil diperbarui.']);
         } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
         }
     }
     
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = contact::findOrFail($id);

        // Delete the Skill record
        $contact->delete();
    
        // Redirect back with a success message
        return redirect('/admin/contact')->with('success', 'Skill successfully deleted!');
    }


    public function search(Request $request)
    {
        // Ambil query pencarian
        $search = $request->input('search');
    
        // Jika ada kata kunci pencarian, filter berdasarkan nama, email, atau mail
        $contacts = Contact::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('email', 'like', '%' . $search . '%')
                         ->orWhere('mail', 'like', '%' . $search . '%');
        })->get();
    
        // Kirim data ke view
        return view('admin.contact.index', compact('contacts'));
    }
    
    


}
