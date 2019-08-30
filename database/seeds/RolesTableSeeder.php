<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            array('role' => 'Новый сотрудник'),
            array('role' => 'Интерн врач'),
            array('role' => 'Интерн психолог'),
            array('role' => 'Врач'),
            array('role' => 'Психолог'),
            array('role' => 'Парамедик'),
            array('role' => 'Зам Глав. Врача'),
            array('role' => 'Глав. Врач')
        );

        DB::table('roles')->insert($roles);
    }
}
