<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student')->insert([
            'stdID' => '6106021600001',
            'firstname' => 'Natthanun',
            'lastname' => 'Thanomrod',
            'subject_id' => 1
        ]);
    }
}
