<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'page',
    'section',
    'title',
    'subtitle',
    'body',
    'button_text',
    'button_url',
    'items',
    'sort_order',
])]
class SiteContent extends Model
{
    protected function casts(): array
    {
        return [
            'items' => 'array',
        ];
    }
}
