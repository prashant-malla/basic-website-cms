<?php

namespace App\Models\Admin;

use App\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasActive, HasFactory;

    protected $fillable = ['title', 'description', 'url', 'is_active'];
}
