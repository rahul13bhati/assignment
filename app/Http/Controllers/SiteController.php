<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataImport;
class SiteController extends Controller
{
    public function index(){
        return view('index');
    }
    public function UploadFile(Request $request){
        
        //$uploadedFile = $request->file('uploadedFile');
        $path = $request->file('uploadedFile')->getRealPath();
        config(['excel.import.startRow' => 6]);
        // $data = Excel::load($path, function($reader) {})->get();
        $data = Excel::import(new DataImport, $path);

        echo "<pre>";
        print_r($data);
        //echo "File uploaded"; exit;
    }
}
