<?php

namespace App\Models\Admin;

use App\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasActive, HasFactory;

    protected $fillable = ['type', 'title', 'slug', 'summary', 'content', 'image', 'is_active'];
}
