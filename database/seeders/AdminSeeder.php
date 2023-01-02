<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auth_models')->insert([
            'name' => 'Isayev Nadirsah',
            'email' => 'isayev.13@mail.ru',
            'password' => bcrypt('creed'),
        ]);
    }
}
