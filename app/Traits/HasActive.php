<?php

namespace App\Traits;

trait HasActive
{
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
