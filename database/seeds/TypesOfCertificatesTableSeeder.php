<?php

use Illuminate\Database\Seeder;

class TypesOfCertificatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array(
            array('type' => 'Медицинская справка'),
            array('type' => 'Психологическая справка'),
            array('type' => 'Справка на оружие'),
            array('type' => 'Справка для вождения')
        );

        DB::table('types_of_certificates')->insert($types);
    }
}
