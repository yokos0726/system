<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Database\Seeds;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call([

            UsersTableSeeder::class,
            ProductsTableSeeder::class,
            SalesTableSeeder::class,
            // CompaniesTableSeeder::class,
        ]);


    }


}
