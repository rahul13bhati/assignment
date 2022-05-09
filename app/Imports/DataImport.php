<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Hash;
use App\Models\Branches;
use App\Models\CommonFeeCollection;
use App\Models\CommonFeeCollectionHeadwise;
use App\Models\EntryMode;
use App\Models\FeeCategory;
use App\Models\FeeCollectionTypes;
use App\Models\FeeTypes;
use App\Models\FinancialTransaction;
use App\Models\FinancialTransactionDetails;
use App\Models\Module;
class DataImport implements ToCollection, WithHeadingRow 
{
    /**
    * @param Collection $collection
    */
    public function startRow(): int
    {
        return 6;
    }
    public function collection(Collection $collection)
    {
        $toArray = $collection->toArray();

        

        $all_branches = array_unique(array_column($toArray, "faculty"));
        $all_fee_category = array_unique(array_column($toArray, "fee_category"));
        $all_fee_heads = array_unique(array_column($toArray, "fee_head"));
        echo "<pre>";
        echo $id = Module::where("module_id", 11)->pluck("id")->first();
        exit;
        foreach($all_branches as $key => $value) {
            $branch = new Branch;
            $branch->branch_name = $value;
            $branch->save();

            foreach($all_fee_category as $k =>$v){
                FeeCategory::insert([
                    "fee_category" => $v,
                    "description" => $v,
                    "branch_id" => $branch->id
                ]);
            }
            $fee_collection_types = [
                ['collection_head'=>'Academic', 'description'=> "Academic", "branch_id" => $branch->id],
                ['collection_head'=>'Academic Misc', 'description'=> "Academic Misc", "branch_id" => $branch->id],
                ['collection_head'=>'Hostel', 'description'=> "Hostel", "branch_id" => $branch->id],
                ['collection_head'=>'Hostel Misc', 'description'=> "Hostel Misc", "branch_id" => $branch->id],
                ['collection_head'=>'Transport', 'description'=> "Transport", "branch_id" => $branch->id],
                ['collection_head'=>'Transport Misc', 'description'=> "Transport Misc", "branch_id" => $branch->id]
                
            ];
            FeeCollectionTypes::insert($fee_collection_types);
        }
        $seq = 1;
        foreach($toArray as $row){
            $branch = Branch::where("branch_name", $row['faculty'])->pluck("id")->first();
            $fee_category =  FeeCategory::where("fee_category", $row['fee_category'])->where("branch_id", $branch)->pluck("id")->first();
            $fee_name = $row['fee_head'];
            $collection = $this->getCollectionID($fee_name, $branch);
            FeeTypes::insert([
                "fee_category" =>$fee_category,
                "fee_name" => $fee_name,
                "collection_id" => $collection['collection_id'],
                "branch_id" => $branch,
                "seq_id" => $seq,
                "fee_type_ledger" => $fee_name,
                "fee_headtype" => $collection['module_id'],
            ]);
        }        
    }
    public function headingRow(): int
    {
        return 6;
    }
    private function getCollectionID($value,$branch_id){
        
        $query = FeeCollectionTypes::where('branch_id', $branch); 
        $module = "";        
        if(in_array(strtolower($value), "tuition fee", "exam fee","library")){
            $module = "Academic";
            $query->where("collection_head", $module);
        }
        elseif(in_array(strtolower($value), "fine fee ", "exam paper fine fee","exam fine fee", "fine")){
            $module = "Academic Misc";  
            $query->where("collection_head", $module); 
        }
        elseif(in_array(strtolower($value), "mess")){
            $module = "Hostel";
            $query->where("collection_head", $module);   
        }
        else {
            return $data["module_id" => 0, "collection_id" => "0"];
        } 

        $collection_id = $query->pluck("id")->first();
        $module_id = Module::where("module_name", $module)->pluck('id')->first();
        return $data["module_id" => $module_id, "collection_id" => $collection_id];
    }
}
