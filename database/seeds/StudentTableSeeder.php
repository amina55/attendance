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
            'roll_no' => '50',
            'enroll_no' => 'sem12345',
            'phone_no' => '09988796898789',
            'address' => 'India',
            'cnic' => '123456789',
            'class_id' => 1,
            'status' => 'active',
        ]);
    }
}
