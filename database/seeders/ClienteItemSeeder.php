<?php

namespace Database\Seeders;

use App\Models\Cliente_Item;
use Illuminate\Database\Seeder;

class ClienteItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente_Item::Factory(35)->create();
    }
}
