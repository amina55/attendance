<?php

use Illuminate\Database\Seeder;
use App\Student;
class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::firstOrCreate([
            'name' => 'student1',
            'semester' => 1,
            'section' => 'A',
            'roll_no' => 1,
            'enroll_no' => 'sem12345',
            'phone_no' => '09988796898789',
            'address' => 'India',
            'status' => 'active',
            'email' => 'student1@gmail.com',
        ]);

        Student::firstOrCreate([
            'name' => 'student2',
            'semester' => 2,
            'section' => 'A',
            'roll_no' => 1,
            'enroll_no' => 'sem2323',
            'phone_no' => '09988796898789',
            'address' => 'India',
            'status' => 'active',
            'email' => 'student2@gmail.com',
        ]);
    }
}
