<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        Program::create(['name' => 'TB', 'description' => 'Tuberculosis Program']);
        Program::create(['name' => 'Malaria', 'description' => 'Malaria Program']);
        Program::create(['name' => 'HIV', 'description' => 'HIV Program']);
    }
}
