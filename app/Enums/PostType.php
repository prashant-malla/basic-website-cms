<?php

namespace App\Enums;

enum PostType: string
{
    case BANNER = 'banner';
    case SERVICE = 'service';
    case BLOG = 'blog';
    case TESTIMONIAL = 'testimonial';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
