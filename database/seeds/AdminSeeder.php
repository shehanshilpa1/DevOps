<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'kalingaudaya@gmail.com',
            'status' => 'active',
            'password' => bcrypt('123456'),
        ]);
        DB::table('user_roles')->insert([
        	'id' => 1,
        	'user_id'	=>	1,
			'role_id'	=>	1,
			'created_at'=>  new DateTime(),
			'updated_at'=>  new DateTime()
        ]);
    }
}
