<?php

namespace App\Models\Admin;

use App\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class PhotoGallery extends Model
{
    use HasActive, HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'main_image', 'is_active'];

    /**
     * Get all of the photo galleries's images.
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
