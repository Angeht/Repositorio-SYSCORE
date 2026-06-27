<?php

namespace App\Livewire\Concerns;

use App\Models\SiteContent;

trait LoadsSiteContent
{
    protected function content(string $page, string $section = 'main'): array
    {
        $content = SiteContent::query()
            ->where('page', $page)
            ->where('section', $section)
            ->first();

        if (! $content) {
            return [
                'title' => '',
                'subtitle' => '',
                'body' => '',
                'button_text' => '',
                'button_url' => '',
                'items' => [],
            ];
        }

        return [
            'title' => $content->title ?? '',
            'subtitle' => $content->subtitle ?? '',
            'body' => $content->body ?? '',
            'button_text' => $content->button_text ?? '',
            'button_url' => $content->button_url ?? '',
            'items' => $content->items ?? [],
        ];
    }
}
