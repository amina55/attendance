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
        $randomName = str_random(5);
        User::firstOrCreate([
            'name' => $randomName,
            'type' => 'admin',
            'username' => $randomName,
            'email' => $randomName.'@gmail.com',
            'password' => bcrypt($randomName),
        ]);
    }
}
