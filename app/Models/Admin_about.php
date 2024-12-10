<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_about extends Model
{
    // Jika nama tabel secara eksplisit didefinisikan:
    use HasFactory;

    // Nama tabel yang sesuai tanpa akhiran 's'
    protected $table = 'admin_about';

    protected $fillable = [
        'judul',
        'sub_subjudul',
        'work',
        'sub_work',
        'img',
        'logo',
    ];
}

