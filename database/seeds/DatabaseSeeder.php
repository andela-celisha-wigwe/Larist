<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Laris\Category::class, 5)->create();

        factory(Laris\Inventory::class, 50)->create();

        Model::reguard();
    }
}
