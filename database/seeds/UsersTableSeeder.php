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
        factory(App\User::class, 25)->create();
        DB::table('users')->insert([
            'user' => 'Jorge m.',
            'email' => 'jm@yahoo.es',
            'password' => bcrypt('secret'),
        ]);
    }
}
