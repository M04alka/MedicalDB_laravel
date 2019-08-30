<?php

use Illuminate\Database\Seeder;

class TypesOfPillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $types = array(
            array('type' => 'Обезболивающие'),
            array('type' => 'Аспирин'),
            array('type' => 'Аддерол'),
            array('type' => 'Валиум'),
            array('type' => 'Ксанакс'),
            array('type' => 'Кетамин')
        );

        DB::table('types_of_pills')->insert($types);
}   }
