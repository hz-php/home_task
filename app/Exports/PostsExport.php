<?php

namespace App\Exports;

use App\Models\BlogPost;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
       return BlogPost::all();
    }
}
