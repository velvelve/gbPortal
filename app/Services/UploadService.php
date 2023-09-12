<?php

namespace App\Services;

use App\Services\Contracts\Upload;
use Exception;
use Illuminate\Http\UploadedFile;

class UploadService implements Upload
{

    public function create(UploadedFile $uploadedFile): string
    {
        $path = $uploadedFile->storeAs('news', $uploadedFile->hashName(), 'public');

        if($path === false)
        {
            throw new Exception("File was not uploaded");
        }

        return $path;
    }

}
