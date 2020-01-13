<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call(RolesTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(MedicalCertificateTypesTableSeeder::class);
        $this->call(PsychologicalCertificateTypesTableSeeder::class);
        $this->call(InsuranceTypesTableSeeder::class);
        $this->call(PillTypesTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(HospitalTypesTableSeeder::class);
        $this->call(SettingsTableSeeder::class); 
        $this->call(MorguesTableSeeder::class); 
    }
}
