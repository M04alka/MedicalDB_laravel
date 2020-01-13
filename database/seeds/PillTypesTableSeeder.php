<?php

use Illuminate\Database\Seeder;

class PillTypesTableSeeder extends Seeder
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
                'pill_name' => 'Обезболивающие',
                'pill_price' => '60',
                'pill_recipe' => 0
            ),
            array(
                'pill_name' => 'Аспирин',
                'pill_price' => '120',
                'pill_recipe' => 0
            ),
            array(
                'pill_name' => 'Аддерол',
                'pill_price' => '150',
                'pill_recipe' => 1
            ),
            array(
                'pill_name' => 'Валиум',
                'pill_price' => '300',
                'pill_recipe' => 1
            ),
            array(
                'pill_name' => 'Ксанакс',
                'pill_price' => '400',
                'pill_recipe' => 1
            ),
            array(
                'pill_name' => 'Кетамин',
                'pill_price' => '600',
                'pill_recipe' => 1
            )
        );

        DB::table('pill_types')->insert($types);
    }
}
