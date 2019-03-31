<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('roles')->insert(['role' => 'user',]);
        DB::table('roles')->insert(['role' => 'admin',]);

        DB::table('currencies')->insert(['currency' => 'EUR', 'fullname' => 'Euro', 'symbol' => '€',]);
        DB::table('currencies')->insert(['currency' => 'USD', 'fullname' => 'Dollar', 'symbol' => '$',]);

        DB::table('users')->insert([
            'name' => 'jeroen',
            'email' => 'jeroen3529@gmail.com',
            'password' => password_hash('vunzkees', PASSWORD_BCRYPT),
            'role_id' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'test1',
            'email' => 'test1@test.test',
            'password' => password_hash('vunzkees', PASSWORD_BCRYPT),
        ]);
        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@test.test',
            'password' => password_hash('vunzkees', PASSWORD_BCRYPT),
        ]);
        DB::table('users')->insert([
            'name' => 'test3',
            'email' => 'test3@test.test',
            'password' => password_hash('vunzkees', PASSWORD_BCRYPT),
        ]);
        DB::table('users')->insert([
            'name' => 'test4',
            'email' => 'test4@test.test',
            'password' => password_hash('vunzkees', PASSWORD_BCRYPT),
        ]);
        DB::table('users')->insert([
            'name' => 'test5',
            'email' => 'test5@test.test',
            'password' => password_hash('vunzkees', PASSWORD_BCRYPT),
        ]);

    }
}
