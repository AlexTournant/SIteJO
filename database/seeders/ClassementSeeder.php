<?php

namespace Database\Seeders;

use App\Models\Classement;
use Database\Factories\ClassementFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classement::factory(10)->create();

    }
}
