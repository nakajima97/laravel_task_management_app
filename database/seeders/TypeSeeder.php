<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate();

        DB::table('types')->insert([
            'id' => 1,
            'name' => '管理者'
        ]);

        DB::table('types')->insert([
            'id' => 2,
            'name' => '通常'
        ]);
    }
}
