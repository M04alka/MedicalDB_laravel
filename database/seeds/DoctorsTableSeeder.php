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
                'doctor_name' => 'Феликс Фонтейн',
                'password' => '123',
                'reg_number' => 'MG882',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '2'
            ),
            array(
                'doctor_name' => 'Джереми Фонтейн',
                'password' => '123',
                'reg_number' => 'MG883',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '3'
            ),
            array(
                'doctor_name' => 'Алекс Фонтейн',
                'password' => '123',
                'reg_number' => 'MG884',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '4'
            ),
            array(
                'doctor_name' => 'Энджел Фонтейн',
                'password' => '123',
                'reg_number' => 'MG885',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '5'
            ),
            array(
                'doctor_name' => 'Ричард Фонтейн',
                'password' => '123',
                'reg_number' => 'MG886',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '6'
            ),
            array(
                'doctor_name' => 'Астрид Фонтейн',
                'password' => '123',
                'reg_number' => 'MG887',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '7'
            ),
            array(
                'doctor_name' => 'Мелинда Фонтейн',
                'password' => '123',
                'reg_number' => 'MG881',
                'is_fired' => '0',
                'is_active' => '1',
                'role_id' => '8'
            ),
        );

        DB::table('doctors')->insert($admin);
    
    }
}
