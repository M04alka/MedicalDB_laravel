<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            array(
                'role_name' => 'Новый пользователь',
                'add_patients' => false,
                'update_insurance' => false,
                'sell_pills' => false,
                'add_to_income' => false,
                'add_to_morgue' => false,
                'write_med_certificates' => false,
                'write_psy_certificates' => false,
                'write_recipe' => false,
                'is_admin' => false
            ),
            array(
                'role_name' => 'Новый сотрудник',
                'add_patients' => false,
                'update_insurance' => false,
                'sell_pills' => false,
                'add_to_income' => false,
                'add_to_morgue' => false,
                'write_med_certificates' => false,
                'write_psy_certificates' => false,
                'write_recipe' => false,
                'is_admin' => false
            ),
            array(
                'role_name' => 'Интерн врач',
                'add_patients' => true,
                'update_insurance' => true,
                'sell_pills' => true,
                'add_to_income' => true,
                'add_to_morgue' => false,
                'write_med_certificates' => true,
                'write_psy_certificates' => false,
                'write_recipe' => false,
                'is_admin' => false
            ),
            array(
                'role_name' => 'Интерн психолог',
                'add_patients' => true,
                'update_insurance' => true,
                'sell_pills' => true,
                'add_to_income' => true,
                'add_to_morgue' => false,
                'write_med_certificates' => false,
                'write_psy_certificates' => true,
                'write_recipe' => false,
                'is_admin' => false
            ),
            array(
                'role_name' => 'Парамедик',
                'add_patients' => true,
                'update_insurance' => true,
                'sell_pills' => true,
                'add_to_income' => true,
                'add_to_morgue' => false,
                'write_med_certificates' => false,
                'write_psy_certificates' => false,
                'write_recipe' => false,
                'is_admin' => false
            ),
            array(
                'role_name' => 'Хирург',
                'add_patients' => true,
                'update_insurance' => true,
                'sell_pills' => true,
                'add_to_income' => true,
                'add_to_morgue' => false,
                'write_med_certificates' => true,
                'write_psy_certificates' => false,
                'write_recipe' => true,
                'is_admin' => false
            ),
            array(
                'role_name' => 'Психолог',
                'add_patients' => true,
                'update_insurance' => true,
                'sell_pills' => true,
                'add_to_income' => true,
                'add_to_morgue' => false,
                'write_med_certificates' => false,
                'write_psy_certificates' => true,
                'write_recipe' => true,
                'is_admin' => false
            ),
            array(
                'role_name' => 'Патологоанатом',
                'add_patients' => true,
                'update_insurance' => true,
                'sell_pills' => true,
                'add_to_income' => false,
                'add_to_morgue' => true,
                'write_med_certificates' => false,
                'write_psy_certificates' => false,
                'write_recipe' => false,
                'is_admin' => false
            ),
            array(
                'role_name' => 'Зам Глав. Врача',
                'add_patients' => true,
                'update_insurance' => true,
                'sell_pills' => true,
                'add_to_income' => true,
                'add_to_morgue' => false,
                'write_med_certificates' => false,
                'write_psy_certificates' => false,
                'write_recipe' => true,
                'is_admin' => false
            ),
            array(
                'role_name' => 'Глав. Врач',
                'add_patients' => true,
                'update_insurance' => true,
                'sell_pills' => true,
                'add_to_income' => true,
                'add_to_morgue' => true,
                'write_med_certificates' => true,
                'write_psy_certificates' => true,
                'write_recipe' => true,
                'is_admin' => true
            )
        );

        DB::table('roles')->insert($roles);
    }
}
