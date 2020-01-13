<?php

use Illuminate\Database\Seeder;

class PsychologicalCertificateTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $psy_cert_types = array(
        	array('type' => 'Справка для страховки'),
        	array('type' => 'Справка для вождения'),
        	array('type' => 'Справка для оружия')
            );
         DB::table('psychological_certificate_types')->insert($psy_cert_types);
    }
}
