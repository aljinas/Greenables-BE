<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserType;
use DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        UserType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        UserType::create(['name' => 'Admin']);
        UserType::create(['name' => 'Staff']);
        UserType::create(['name' => 'Accounts']);
        UserType::create(['name' => 'Sales']);
    }
}
