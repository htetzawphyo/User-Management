<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Documents;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DocumentsController extends Controller
{
    // for check data 
    public function index()
    {
        $files = Storage::disk('do')->allFiles();
        
        foreach ($files as $file) {
            echo $file . '<br>';
        }
    }

    public function store(DocumentsRequest $request) 
    {
        $fileSize = $request->file('doc_file')->getSize();
        $sizeInKB = round($fileSize/1024, 2);
        $sizeInMB = round($sizeInKB/1024, 2);
        
        $file = $request->file('doc_file');
        $path = time() . '_' . $request->file('doc_file')->getClientOriginalName();
        
        Storage::put('documents/' . $path, file_get_contents($file));
        // if($request->storage == 1) {
        //     Storage::disk('do')->put('/hzp/'.$path, file_get_contents($file));
        // }else{
        //     Storage::put('documents/' . $path, file_get_contents($file));
        // }

        $document = new Documents();
        $document->user_id = $request->user_id;
        $document->title = $request->doc_name;
        $document->file_path = $path;
        if($sizeInKB < 1024){
            $document->size = $sizeInKB.'KB';
        } else {
            $document->size = $sizeInMB.'MB';
        }

        $document->save();
        return back()->with('message', 'Sucessfully uploaded.');
    }

    public function delete(Documents $document)
    {
        if(Storage::exists('documents/'. $document->file_path)){
            Storage::delete('documents/'.$document->file_path);
        }

        // if(Storage::disk('do')->exists('hzp/'. $document->file_path)){
        //     Storage::disk('do')->delete('hzp/'.$document->file_path);
        // }
        
        $document->delete();

        return back()->with('message', 'Sucessfully deleted.');
    }
}
