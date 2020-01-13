<?php

use Illuminate\Database\Seeder;

class HospitalTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospital_types = array(
        	array(
                'type' => 'Общая палата',
                'price' => '0',
                'is_empty' => true
            ),
        	array(
                'type' => 'VIP палата №1',
                'price' => '2000',
                'is_empty' => true
            ),
        	array(
                'type' => 'VIP палата №2',
                'price' => '2000',
                'is_empty' => true
            )
            );
         DB::table('hospital_types')->insert($hospital_types);
    }
}
