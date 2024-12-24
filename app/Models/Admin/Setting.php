<?php

namespace App\Models\Admin;

use App\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasActive, HasFactory;

    protected $fillable = ['key', 'value', 'is_active'];
}
