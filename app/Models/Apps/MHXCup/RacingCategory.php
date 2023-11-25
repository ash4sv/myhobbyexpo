<?php

namespace App\Models\Apps\MHXCup;

use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RacingCategory extends Model
{
    use HasFactory, SoftDeletes;

    public function saveRacingCategory($category, $request)
    {
        $category->category_name = $request->category_name;
        if ($request->hasFile('category_image')) {
            $category_image = ImageUploader::uploadSingleImage($request->file('category_image'), 'assets/upload/', 'mhxcup_category');;
        } else {
            $category_image = $category->category_image;
        }
        $category->category_image = $category_image;
        $category->save();
    }


}
