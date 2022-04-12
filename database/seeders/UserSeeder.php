<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\UserType;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        User::create(['name' => 'Admin', 'username'=>'admin', 'email' => 'admin@tab.com', 'password' => '123456', 'user_type_id' => 1, 'branch_id'=>1,'status'=>1 ]);
    }
}
