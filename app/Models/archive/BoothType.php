<?php

namespace App\Models\Apps;

use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoothType extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        /*->logOnly(['name'])*/;
        // Chain fluent methods for configuration options
    }

    public function numbers()
    {
        return $this->hasMany(BoothNumber::class, 'category_id', 'id');
    }

    public function saveBoothType($category, $request)
    {
        if ($request->hasFile('layout_plan')) {
            $boothCategoryImge = ImageUploader::uploadSingleImage($request->file('layout_plan'), 'assets/images', 'layout_plan');;
        } else {
            $boothCategoryImge = $category->image;
        }

        if ($request->hasFile('image')) {
            $image = ImageUploader::uploadSingleImage($request->file('image'), 'assets/images', 'image');;
        } else {
            $image = $category->image;
        }

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;

        $category->image = $image;
        $category->layout_plan = $boothCategoryImge;
        $category->ffe_table = $request->table;
        $category->ffe_chair = $request->chair;
        $category->ffe_sso = $request->sso;
        $category->price = $request->price;
        $category->save();
    }
}
