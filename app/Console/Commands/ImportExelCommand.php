<?php

namespace App\Console\Commands;

use App\Imports\ExelImport;
use App\Imports\PostsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:exel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exel file import to base';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Excel::import(new PostsImport(), public_path('exel/posts.xlsx'));
        dd('finish');
    }
}
