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
            array(
                'type' => 'Льготная',
                'price' => '0',
                'about' => 'Покрывает 20% от серьйозных травм'
            ),
            array(
                'type' => 'Базовая',
                'price' => '2500',
                'about' => 'Покрывает 20% от серьйозных травм'
            ),
            array(
                'type' => 'Бронзовая',
                'price' => '4500',
                'about' => 'Покрывает 25% от серьйозных травм'
            ),
            array(
                'type' => 'Серебряная',
                'price' => '7500',
                'about' => 'Покрывает 50% от серьйозных травм'
            ),
            array(
                'type' => 'Золотая',
                'price' => '10500',
                'about' => 'Покрывает 75% от серьйозных травм'
            ),
            array(
                'type' => 'Платиновая',
                'price' => '16500',
                'about' => 'Покрывает 100% от серьйозных травм'
            ),
            array(
                'type' => 'Полицейская',
                'price' => '0',
                'about' => 'Покрывает 20% от серьйозных травм'
            ),
            array(
                'type' => 'Медицинская',
                'price' => '0',
                'about' => 'Покрывает 20% от серьйозных травм'
            )
        );

        DB::table('types_of_insurance')->insert($types);
    }
}
