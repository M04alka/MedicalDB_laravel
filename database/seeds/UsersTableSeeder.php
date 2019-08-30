<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'd_name' => 'Феликс Фонтейн',
                'password' => '123',
                'reg_number' => 'MG882',
                'is_active' => '1',
                'role_id' => '2'
            ),
            array(
                'd_name' => 'Джереми Фонтейн',
                'password' => '123',
                'reg_number' => 'MG883',
                'is_active' => '1',
                'role_id' => '3'
            ),
            array(
                'd_name' => 'Алекс Фонтейн',
                'password' => '123',
                'reg_number' => 'MG884',
                'is_active' => '1',
                'role_id' => '4'
            ),
            array(
                'd_name' => 'Энджел Фонтейн',
                'password' => '123',
                'reg_number' => 'MG885',
                'is_active' => '1',
                'role_id' => '5'
            ),
            array(
                'd_name' => 'Ричард Фонтейн',
                'password' => '123',
                'reg_number' => 'MG886',
                'is_active' => '1',
                'role_id' => '6'
            ),
            array(
                'd_name' => 'Астрид Фонтейн',
                'password' => '123',
                'reg_number' => 'MG887',
                'is_active' => '1',
                'role_id' => '7'
            ),
            array(
                'd_name' => 'Мелинда Фонтейн',
                'password' => '123',
                'reg_number' => 'MG881',
                'is_active' => '1',
                'role_id' => '8'
            ),
        );

        DB::table('users')->insert($admin);
    }
}
