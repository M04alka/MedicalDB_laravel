<?php

use Illuminate\Database\Seeder;

class MedicalCertificateTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $med_cert_types = array(
        	array('type' => 'Справка для страховки'),
        	array('type' => 'Анализ крови')
            );
        DB::table('medical_certificate_types')->insert($med_cert_types);
    }
}
