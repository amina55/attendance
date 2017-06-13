<?php

use Illuminate\Database\Seeder;
use App\Teacher;
class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::firstOrCreate([
            'name' => 'teacher1',
            'phone_no' => '03000589799080',
            'email' => 'teacher1@gmail.com',
            'address' => 'India',
            'qualification' => 'PHD chem',
            'unique_name' => 'teacher1',
            'cnic' => '0987654321',
            'status' => 'active',
        ]);
    }
}
