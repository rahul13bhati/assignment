<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EntryMode;
class EntryModes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntryMode::insert([
            ["mode_name" => "due", "crdr" =>"D" , "entry_mode_no" => 0],
            ["mode_name" => "REVDUE", "crdr" =>"C" , "entry_mode_no" => 12],
            ["mode_name" => "scholarship", "crdr" =>"C" , "entry_mode_no" => 15],
            ["mode_name" => "scholarship_con_rev", "crdr" =>"D" , "entry_mode_no" => 16],
            ["mode_name" => "concession", "crdr" =>"C" , "entry_mode_no" => 15],
            ["mode_name" => "RCPT", "crdr" =>"C" , "entry_mode_no" => 0],
            ["mode_name" => "REVRCPT", "crdr" =>"D" , "entry_mode_no" => 0],
            ["mode_name" => "JV", "crdr" =>"C" , "entry_mode_no" => 14],
            ["mode_name" => "REVJV", "crdr" =>"D" , "entry_mode_no" => 14],
            ["mode_name" => "PMT", "crdr" =>"D" , "entry_mode_no" => 1],
            ["mode_name" => "REVPMT", "crdr" =>"C" , "entry_mode_no" => 1],
            ["mode_name" => "Fund Transfer", "crdr" =>"+/-" , "entry_mode_no" => 1],
        ]);

    }
}
