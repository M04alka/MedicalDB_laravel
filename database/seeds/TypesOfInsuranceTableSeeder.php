<?php

use Illuminate\Database\Seeder;

class TypesOfInsuranceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array(
            array('type' => 'Льготная'),
            array('type' => 'Базовая'),
            array('type' => 'Бронзовая'),
            array('type' => 'Серебряная'),
            array('type' => 'Золотая'),
            array('type' => 'Платиновая'),
            array('type' => 'Полицейская'),
            array('type' => 'Медицинская')
        );

        DB::table('types_of_insurance')->insert($types);
    }
}
