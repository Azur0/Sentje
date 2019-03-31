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

        DB::table('currencies')->insert(['currency' => 'EUR','fullname' => 'Euro','symbol' => '€',]);
        DB::table('currencies')->insert(['currency' => 'USD','fullname' => 'Dollar','symbol' => '$',]);

    }
}
