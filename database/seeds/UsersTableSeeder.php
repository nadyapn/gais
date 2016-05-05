<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed database
        DB::table('employee')->insert(
            array(
                array(
                    'id_employee' => '1',
                    'name' => 'Putu Wira',
                    'email' => 'putuwira@gmail.com',
                    'password' => Hash::make('putuwira'),
                    'division' => 'Business Unit',
                    'position' => 'Head of Business Unit',
                    'role'  => 'Admin',
                    'supervisor' => null,
                ),
                array(
                    'id_employee' => '2',
                    'name' => 'Siti Fatimah',
                    'email' => 'sitifatimah@gmail.com',
                    'password' => Hash::make('siti'),
                    'division' => 'Human Resource',
                    'position' => 'Head of HR',
                    'role'  => 'Non Admin',
                    'supervisor' => null,
                ),
                array(
                    'id_employee' => '3',
                    'name' => 'Prima Permata',
                    'email' => 'primapermata@gmail.com',
                    'password' => Hash::make('prima'),
                    'division' => 'Web Development',
                    'position' => 'Team Leader',
                    'role'  => 'Non Admin',
                    'supervisor' => null,
                ),
                array(
                    'id_employee' => '4',
                    'name' => 'Nadya Putri',
                    'email' => 'nadyaputri@gmail.com',
                    'password' => Hash::make('nadya'),
                    'division' => 'Web Development',
                    'position' => 'Member',
                    'role'  => 'Non Admin',
                    'supervisor' => '3',
                ),
                array(
                    'id_employee' => '5',
                    'name' => 'Rahma Ilyas',
                    'email' => 'rahmailyas@gmail.com',
                    'password' => Hash::make('rahma'),
                    'division' => 'Web Development',
                    'position' => 'Member',
                    'role'  => 'Non Admin',
                    'supervisor' => '3',
                ),
         	)
        );
    }
}
