<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FilepondUploadTrait
{
    public function fileUpload($model, $tmp_folder)
    {
        //gets model name eg:Category >> categories
        $model_name = $model->getTable();

        $image_dir = Storage::disk('tmp')->files($tmp_folder)[0];  /// 123123-123123/image.jpg
        $folder_name = Str::of($image_dir)->before('/');
        $image_name = Str::of($image_dir)->after('/');

        $model->addMedia(public_path('images/tmp/'.$image_dir))
        ->usingName($model_name.'-'.$image_name)
        ->usingFileName($model_name.'-'.$image_name)
        ->toMediaCollection();

        Storage::disk('tmp')->deleteDirectory($folder_name);
    }
}
