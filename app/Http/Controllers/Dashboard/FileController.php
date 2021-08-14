<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->has('files')) {
            $folder = uniqid().'-'.now()->timestamp;
            foreach ($request->file('files') as $file) {
                $filename = Storage::disk('tmp')->put($folder, $file);
                // $file->move(public_path().'/images/tmp/'.$folder, $filename);
            }

            return $folder; // remove evertyhing before first /
        }

        return '';
    }
}
