<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Utility extends Model
{
    public static function storeFile($file, $directory, $disk)
    {
        if ($file) {
            return $file->store($directory, $disk);
        }
        return null;
    }

    public static function storeFiles($files, $directory, $disk)
    {
        $filePaths = [];
        if ($files) {
            foreach ($files as $file) {
                $filePaths[] = $file->store($directory, $disk);
            }
        }
        return $filePaths;
    }

    public static function deleteFile($filePath, $disk)
    {
        if ($filePath && Storage::disk($disk)->exists($filePath)) {
            return Storage::disk($disk)->delete($filePath);
        }
        return false;
    }
    
    public static function deleteFiles($filePaths, $disk)
    {
        if ($filePaths) {
            foreach ($filePaths as $filePath) {
                self::deleteFile($filePath, $disk);
            }
        }
    }
}
