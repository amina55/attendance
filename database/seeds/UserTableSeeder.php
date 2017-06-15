<?php

use Illuminate\Database\Seeder;

use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['username' => 'amina'], [
            'name' => 'amina',
            'username' => 'amina',
            'email' => 'amina@gmail.com',
            'password' => bcrypt('amina'),
        ]);
    }
}
