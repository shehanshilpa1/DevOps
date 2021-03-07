<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	['id' => 1, 'name'	=> 'SUPER_ADMIN', 'description'	=> 'Who controls everything in the system','created_at'=>  new DateTime(), 'updated_at'=>  new DateTime()],
        	['id' => 2, 'name'	=> 'ADMIN', 'description'	=> 'Who controls most areas in the syste. Basically department head.','created_at'=>  new DateTime(), 'updated_at'=>  new DateTime()],
        	['id' => 3, 'name'	=> 'MANAGER', 'description'	=> 'Who controls complaints in the department','created_at'=>  new DateTime(), 'updated_at'=>  new DateTime()],
        	['id' => 4, 'name'	=> 'USER', 'description'	=> 'Who can resolve problems','created_at'=>  new DateTime(), 'updated_at'=>  new DateTime()]
        ];

        foreach ($roles as $key => $role) {
        	DB::table('roles')->insert($role);
        }
    }
}
