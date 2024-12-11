<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Admin_aboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminCertificatesController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminProjectsController;
use App\Http\Controllers\SkillController;






Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
});


require __DIR__ . '/auth.php';
Route::get('/admin/about', [Admin_aboutController::class, 'index'])->name('admin_about');
Route::get('/admin/tambah_about', [Admin_aboutController::class, 'tambah_about'])->name('tambah_about');
Route::post('/admin/submit_about', [Admin_aboutController::class, 'submit_about'])->name('admin.submit_about');
Route::get('/admin/edit_about/{id}', [Admin_aboutController::class, 'edit_about'])->name('admin.edit_about');
Route::put('/admin/update_about/{id}', [Admin_aboutController::class, 'update_about'])->name('admin.update_about');
Route::delete('/admin/delete_about/{id}', [Admin_aboutController::class, 'delete_about'])->name('admin.delete_about');

//skill


// Definisi rute resource untuk skill
Route::resource('admin/skill', AdminSkillController::class)->names([
    'index' => 'admin.skill.index', // Menetapkan nama rute untuk index
    'create' => 'admin.skill.create',
    'store' => 'admin.submit_skill',
    'edit' => 'admin.edit_skill',
    'update' => 'admin.update_skill',
    'destroy' => 'admin.delete_skill'
]);


//home
Route::resource('/admin/home', AdminHomeController::class)->names('admin.home');
Route::post('/admin/home/create', [AdminHomeController::class, 'create'])->name('admin.create');
Route::post('/admin/home/submit_home', [AdminHomeController::class, 'submit_home'])->name('admin.submit_home');
Route::get('/admin/home/edit/{id}', [AdminHomeController::class, 'edit'])->name('admin.edit_home');
Route::put('/admin/home/update/{id}', [AdminHomeController::class, 'update'])->name('admin.update_home');
Route::delete('/admin/home/delete/{id}', [AdminHomeController::class, 'delete_home'])->name('admin.delete_home');



//certificate
// Use Route::resource to define standard resource routes
Route::resource('/admin/certificates', AdminCertificatesController::class, [
    'names' => [
        'index' => 'admin.certificates.index',
        'create' => 'admin.certificates.create',
        'store' => 'admin.certificates.store',
        'edit' => 'admin.certificates.edit',
        'update' => 'admin.certificates.update',
        'destroy' => 'admin.certificates.destroy'
    ]
]);

Route::post('admin/certificates/submit_certificate', [AdminCertificatesController::class, 'submit_certificate'])->name('admin.submit.certificates');

//contact
Route::resource('/admin/contact', AdminContactController::class)->names('admin.contact');
Route::post('/admin/contact/create', [AdminContactController::class, 'create'])->name('admin.contact.create');
Route::post('admin/contact/submit_contact', [AdminContactController::class, 'store'])->name('admin.contact.store');
Route::get('/admin/contact/edit/{id}', [AdminContactController::class, 'edit'])->name('admin.contact.edit');
Route::put('/admin/contact/update/{id}', [AdminContactController::class, 'update'])->name('admin.contact.update');
Route::delete('/admin/contact/delete/{id}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');
Route::get('/admin/contact/index', [AdminContactController::class, 'search'])->name('admin.contact.search');

//projects
Route::get('/admin/projects', [AdminProjectsController::class, 'index'])->name('admin.projects.index');
Route::get('/projects/create', [AdminProjectsController::class, 'create'])->name('admin.projects.create');
Route::post('/projects', [AdminProjectsController::class, 'store'])->name('admin.projects.store');
Route::get('/projects/{id}', [AdminProjectsController::class, 'show'])->name('admin.projects.show');
Route::get('/projects/{id}/edit', [AdminProjectsController::class, 'edit'])->name('admin.projects.edit');
Route::put('/projects/{id}', [AdminProjectsController::class, 'update'])->name('admin.projects.update');
Route::delete('/projects/{id}', [AdminProjectsController::class, 'destroy'])->name('admin.projects.destroy');
