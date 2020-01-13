<?php

use Illuminate\Database\Seeder;

class InsuranceTypesTableSeeder extends Seeder
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
                'insurance_type' => 'Льготная',
                'insurance_price' => '0',
                'about_insurance' => 'Покрывает 20% от серьйозных травм',
                'insurance_percent' => '20'

            ),
            array(
                'insurance_type' => 'Базовая',
                'insurance_price' => '2500',
                'about_insurance' => 'Покрывает 20% от серьйозных травм',
                'insurance_percent' => '20'
            ),
            array(
                'insurance_type' => 'Бронзовая',
                'insurance_price' => '4500',
                'about_insurance' => 'Покрывает 25% от серьйозных травм',
                'insurance_percent' => '25'
            ),
            array(
                'insurance_type' => 'Серебряная',
                'insurance_price' => '7500',
                'about_insurance' => 'Покрывает 50% от серьйозных травм',
                'insurance_percent' => '05'
            ),
            array(
                'insurance_type' => 'Золотая',
                'insurance_price' => '10500',
                'about_insurance' => 'Покрывает 75% от серьйозных травм',
                'insurance_percent' => '75'
            ),
            array(
                'insurance_type' => 'Платиновая',
                'insurance_price' => '16500',
                'about_insurance' => 'Покрывает 100% от серьйозных травм',
                'insurance_percent' => '100'
            ),
            array(
                'insurance_type' => 'Полицейская',
                'insurance_price' => '0',
                'about_insurance' => 'Покрывает 100% от серьйозных травм',
                'insurance_percent' => '100'
            ),
            array(
                'insurance_type' => 'Медицинская',
                'insurance_price' => '0',
                'about_insurance' => 'Покрывает 100% от серьйозных травм',
                'insurance_percent' => '100'
            )
        );

        DB::table('insurance_types')->insert($types);
    }
}
