<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
      
        \App\Models\Gender::factory()->create([
            'gender' => 'Male'
        ]);
         \App\Models\Gender::factory()->create([
            'gender' => 'Female'
        ]);
        \App\Models\User::factory(5)->create();
        
        \App\Models\User::factory()->create([
            'first_name' => 'hyacinth',
            'middle_name' => 'dumalag',
            'last_name' => 'beter',
            'suffix_name' => null,
            'birth_date' => '2002-10-23',
            'gender_id' => 1,
            'address' => 'roxas city',
            'contact_number' => '09512154944',
            'email_address' => 'hyacinthannbeter1@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);

    }
}
