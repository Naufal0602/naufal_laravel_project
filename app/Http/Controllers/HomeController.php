<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Certificates;
use App\Models\Home;
use App\Models\skill;
use App\Models\admin_about;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $projects = Projects::all();
    $certificates = Certificates::all();
    $home = Home::all();  // Variabel ini
    $skills = Skill::all();
    $about = Admin_about::all();

    return view('home', compact('projects', 'certificates', 'home', 'skills', 'about'));  // Mengirim variabel home ke view
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
