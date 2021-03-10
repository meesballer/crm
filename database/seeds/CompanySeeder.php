<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'xaris',
            'email' => 'admin@admin.com',
            'address' => 'Westerspoor 1',
            'website' => 'xaris.nl',
            'user_id' => '1',
        ]);
    }
}
