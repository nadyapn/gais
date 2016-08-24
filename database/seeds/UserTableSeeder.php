<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                    'email' => 'lusianaprima@gmail.com',
                    'password' => Hash::make('prima'),
                    'division' => 'Designer',
                    'position' => 'Team Leader',
                    'role'  => 'Non Admin',
                    'supervisor' => null,
                ),
                array(
                    'id_employee' => '4',
                    'name' => 'Nadya Putri',
                    'email' => 'nadyaputri@gmail.com',
                    'password' => Hash::make('nadya'),
                    'division' => 'Designer',
                    'position' => 'Member',
                    'role'  => 'Non Admin',
                    'supervisor' => '3',
                ),
                array(
                    'id_employee' => '5',
                    'name' => 'Rahma Ilyas',
                    'email' => 'rahmailyas@gmail.com',
                    'password' => Hash::make('rahma'),
                    'division' => 'Designer',
                    'position' => 'Member',
                    'role'  => 'Non Admin',
                    'supervisor' => '3',
                ),
                array(
                    'id_employee' => '6',
                    'name' => 'Justin Bieber',
                    'email' => 'justinbieber@gmail.com',
                    'password' => Hash::make('justin'),
                    'division' => 'Office Boy',
                    'position' => 'Office Boy',
                    'role'  => 'Non Admin',
                    'supervisor' => null,
                ),
                array(
                    'id_employee' => '7',
                    'name' => 'Selena Gomez',
                    'email' => 'selenagomez@gmail.com',
                    'password' => Hash::make('selena'),
                    'division' => 'Office Boy',
                    'position' => 'Office Boy',
                    'role'  => 'Non Admin',
                    'supervisor' => null,
                ),
         	)
        );
    }
}
