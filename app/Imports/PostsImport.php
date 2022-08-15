<?php

namespace App\Imports;

use App\Models\BlogPost;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $item) {
            if (isset($item['title'])) {
                BlogPost::create([
                    'category_id' => $item['category_id'],
                    'user_id' => $item['user_id'],
                    'slug' => Str::random(40),
                    'title' => $item['title'],
                    'excerpt' => $item['excerpt'],
                    'content_raw' => $item['content_raw'],
                    'content_html' => $item['content_html'],
                    'is_published' => $item['is_published'],
                    'published_at' => null,
                    'created_at' => null,
                    'updated_at' => null,
                    'deleted_at' => null,
                ]);
            }
        }

    }
}
