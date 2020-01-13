<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
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
                'setting_type' => 'pills_count',
                'setting_value' => 5
            ),
            array(
                'setting_type' => 'auto_active_insurance',
                'setting_value' => 0
            ),
            array(
                'setting_type' => 'sell_pills_without_insurance',
                'setting_value' => 0
            )
        );

        DB::table('settings')->insert($types);
    }
}
