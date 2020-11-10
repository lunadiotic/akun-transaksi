<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Upload Image for Profile
 * And Attendance
 */
trait UploadFile
{
    /**
     * For Upload Photo
     * @param mixed $file
     * @param mixed $name
     * @param mixed $path
     * @param bool $update
     * @param mixed|null $old_file
     * @return void
     */
    public function uploadFile($file, $name, $path, $update = false, $old_file = null)
    {
        if ($update) {
            Storage::delete("/public/{$path}/" . $old_file);
        }

        $name = Str::slug($name) . '-' . time();
        $extension = $file->getClientOriginalExtension();
        $newName = $name . '.' . $extension;
        Storage::putFileAs("/public/{$path}", $file, $newName);
        return $newName;
    }

    /**
     *
     * @param mixed $old_file
     * @param mixed $path
     * @return void
     */
    public function deleteFile($old_file, $path)
    {
        Storage::delete("/public/{$path}" . $old_file);
    }
}
