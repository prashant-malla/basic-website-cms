<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasFile
{
    public function uploadFile($file, $directory = 'images', $disk = 'public')
    {
        $extension = $file->getClientOriginalExtension();
        $filename = $directory.'-'.date('Ymdhis').rand(0, 999).'.'.$extension;

        $destination = $disk == 'public' ? public_path('uploads'.'/'.$directory) : storage_path('uploads'.'/'.$directory);
        $success = $file->move($destination, $filename);

        if ($success) {
            return $filename;
        } else {
            return false;
        }
    }

    public function getFileUrl($filename, $directory = 'uploads/images', $disk = 'public')
    {
        if ($filename) {
            $path = $directory.'/'.$filename;
            if ($disk == 'public') {
                return asset($path);
            } else {
                // return Storage::disk($disk)->url($path);
            }
        } else {
            return null;
        }
    }

    public function deleteFile($filename, $directory = 'images', $disk = 'public')
    {
        $path = $disk == 'public' ? public_path('uploads'.'/'.$directory.'/'.$filename) : storage_path('uploads'.'/'.$directory.'/'.$filename);
        if (file_exists($path)) {
            unlink($path);

            return true;
        } else {
            return false;
        }
    }
}
