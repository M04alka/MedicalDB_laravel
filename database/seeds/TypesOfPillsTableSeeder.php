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
            array(
                'type' => 'Обезболивающие',
                'price' => '60',
                'about' => 'Продаеться без рецепта'
            ),
            array(
                'type' => 'Аспирин',
                'price' => '120',
                'about' => 'Продаеться без рецепта'
            ),
            array(
                'type' => 'Аддерол',
                'price' => '150',
                'about' => 'Продаеться только по рецепту!'
            ),
            array(
                'type' => 'Валиум',
                'price' => '300',
                'about' => 'Продаеться только по рецепту!'
            ),
            array(
                'type' => 'Ксанакс',
                'price' => '400',
                'about' => 'Продаеться только по рецепту!'
            ),
            array(
                'type' => 'Кетамин',
                'price' => '600',
                'about' => 'Продаеться только по рецепту!'
            )
        );

        DB::table('types_of_pills')->insert($types);
}   }
