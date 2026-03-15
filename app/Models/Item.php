<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'location',
        'status',
        'contact_email',
        'image'
    ];

    use HasFactory;
}
