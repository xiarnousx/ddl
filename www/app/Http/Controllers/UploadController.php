<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadFileRequest;
use App\Jobs\SaveUploadFile;
use Illuminate\Contracts\Container\BindingResolutionException;

class UploadController extends Controller
{
    public function list(Request $request)
    {
        $uploads = Storage::allFiles('uploads');
        return view('list', ['files' => $uploads]);
    }

    public function download($file)
    {
        return response()->download(storage_path("app/$file"));
    }

    public function upload()
    {
        return view('upload');
    }

    public function process(UploadFileRequest $request)
    {
        $fileName = $request->fileName;
        $file = $request->file('userFile');
        $filePath = SaveUploadFile::dispatchSync($file);

        return response()->json(["success" => true]);
    }
}
