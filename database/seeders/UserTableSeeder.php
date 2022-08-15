<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Автор не известен',
                'email' => 'author_unknown@g.g',
                'password' => bcrypt(Str::random(16)),
            ],
            [
                'name' => 'Автор',
                'email' => 'author@g.g',
                'password' => bcrypt(Str::random(123123)),
            ],
        ];
        DB::table('users')->insert($data);
    }
}
