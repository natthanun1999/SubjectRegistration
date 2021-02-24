<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject')->insert(array(
            [
                'subject_id' => '060213514',
                'name' => 'Laravel'
            ],
            [
                'subject_id' => '060213290',
                'name' => 'Mobile App.'
            ],
            [
                'subject_id' => '060213540',
                'name' => 'Linux'
            ],
            [
                'subject_id' => '060213543',
                'name' => 'Data Mining'
            ],
            [
                'subject_id' => '060213507',
                'name' => 'DSS'
            ]
        ));
    }
}
