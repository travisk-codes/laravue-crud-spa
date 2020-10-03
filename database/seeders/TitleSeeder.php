<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Title;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Title::factory()
            ->times(10)
            ->create();
    }
}
