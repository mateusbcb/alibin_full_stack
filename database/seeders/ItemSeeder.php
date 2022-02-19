<?php

namespace Database\Seeders;

use App\Models\item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        item::Factory(55)->create();
    }
}
