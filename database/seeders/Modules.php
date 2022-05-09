<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
class Modules extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::insert([
                ['module_name'=>'Academic', "module_id" => 1],
                ['module_name'=>'Academic Misc', "module_id" => 11],
                ['module_name'=>'Hostel', "module_id" =>  2],
                ['module_name'=>'Hostel Misc', "module_id" => 22],
                ['module_name'=>'Transport', "module_id" => 3],
                ['module_name'=>'Transport Misc', "module_id" => 33],
                
            ]);
    }
}
