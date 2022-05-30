<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
                'name' => 'Abuja',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ],
            [
                'name' => 'Lagos',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ],
            [
                'name' => 'Ibadan',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ]]
        );
    }
}
