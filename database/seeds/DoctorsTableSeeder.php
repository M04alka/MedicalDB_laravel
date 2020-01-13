<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = array(
            array(
                'doctor_name' => 'admin',
                'password' => 'admin',
                'reg_number' => 'AD001',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '9',
                'reason' => ''
            ),
            array(
                'doctor_name' => 'ps',
                'password' => 'ps',
                'reg_number' => 'AD002',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '6',
                'reason' => ''
            ),
             array(
                'doctor_name' => 'mc',
                'password' => 'mc',
                'reg_number' => 'AD003',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '5',
                'reason' => ''
            ),
             array(
                'doctor_name' => 'mg',
                'password' => 'mg',
                'reg_number' => 'AD004',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '7',
                'reason' => ''
            )
        );

        DB::table('doctors')->insert($admin);
    }
}
