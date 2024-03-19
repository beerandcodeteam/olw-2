<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            RoleSeeder::class,
            AddressSeeder::class,
            CompanySeeder::class,
            UserSeeder::class,
            SaleSeeder::class,
        ]);

        DB::unprepared("REFRESH MATERIALIZED VIEW sales_commission_view");
    }
}
