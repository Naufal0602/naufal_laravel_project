<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificates extends Model
{

    use HasFactory;
    
    protected $table = 'certificates';
    protected $fillable = [
        'name',
        'issued_by', 
        'issued_at',
        'file',
        'image',
        'description'
        ];
}

