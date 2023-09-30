<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploader extends Model
{
    /**
     * Upload a single image file to the specified directory with a custom name.
     *
     * @param UploadedFile $file The uploaded image file.
     * @param string $directory The directory where the image file should be saved.
     * @param string|null $filename The custom name to give to the image file (optional).
     * @return string The path to the uploaded image file.
     */
    public static function uploadSingleImage(UploadedFile $file, string $directory, ?string $filename = null): string
    {
        // Use the original filename if no custom filename is provided.
        $filename = $filename ?? $file->getClientOriginalName();

        // Generate a unique filename to avoid overwriting existing files.
        $uniqueFilename = uniqid() . '-' . $filename;

        // Get the original file extension.
        $extension = $file->getClientOriginalExtension();

        // Save the file to the specified directory.
        // $path = $file->storeAs($directory, $uniqueFilename.'.'.$extension);
        // $path = $file->storeAs('public/'.$directory, $uniqueFilename.'.'.$extension);
        $path = $file->move($directory,$uniqueFilename.'.'.$extension);

        // Return the path to the saved file.
        return $path;
    }

    /**
     * Upload multiple image files to the specified directory with custom names.
     *
     * @param array $files An array of uploaded image files.
     * @param string $directory The directory where the image files should be saved.
     * @param array|null $filenames An array of custom names to give to the image files (optional).
     * @return array An array of paths to the uploaded image files.
     */
    public static function uploadMultipleImages(array $files, string $directory, ?array $filenames = null): array
    {
        $paths = [];

        // If no custom filenames are provided, use the original filenames.
        if ($filenames === null) {
            $filenames = array_map(function($file) {
                return $file->getClientOriginalName();
            }, $files);
        }

        // Loop through the uploaded files and save them to the specified directory.
        foreach ($files as $index => $file) {
            $filename = $filenames[$index] ?? null;
            // Get the original file extension.
            $extension = $file->getClientOriginalExtension();
            // Generate a unique filename to avoid overwriting existing files.
            $uniqueFilename = uniqid() . '_' . $filename;

            // Save the file to the specified directory with the original extension.
            // $path = $file->storeAs($directory, $uniqueFilename.'.'.$extension);
            // $path = $file->storeAs('public/'.$directory, $uniqueFilename.'.'.$extension);
            $path = $file->move(public_path($directory), $uniqueFilename.'.'.$extension);
            $paths[] = $path;
        }

        // Return an array of paths to the saved files.
        return $paths;
    }
}

