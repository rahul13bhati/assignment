<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('index');
    }
    public function UploadFile(Request $request){
        
        //$uploadedFile = $request->file('uploadedFile');
        return Plupload::receive('uploadedFile', function ($file)
            {
                $file->move(storage_path() . '/test/', $file->getClientOriginalName());

                return 'ready';
            });
        //echo "File uploaded"; exit;
    }
}
