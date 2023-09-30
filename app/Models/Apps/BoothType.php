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

    public static function createOrUpdate($id, $request)
    {
        // Validation rules (customize as needed)
        $rules = [
            'layout_plan' => 'required|image|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/webp|max:2048',
            'name' => 'required',
            'description' => 'required',
            'table' => 'required|integer',
            'chair' => 'required|integer',
            'sso' => 'required|integer',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];

        if ($id !== null) {
            // If $id is not null, it means we are updating an existing record,
            // so exclude unique validation rules that apply to new records.
            $rules['name'] .= ',name,' . $id;
        }

        $request->validate($rules);

        // Common code for both store and update
        $category = BoothType::findOrNew($id);

        if ($request->hasFile('layout_plan')) {
            $boothCategoryImage = ImageUploader::uploadSingleImage($request->file('layout_plan'), 'assets/images', 'layout_plan');
        } else {
            $boothCategoryImage = $category->image;
        }

        // Update category fields
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->image = $boothCategoryImage;
        $category->layout_plan = $boothCategoryImage;
        $category->table = $request->table;
        $category->chair = $request->chair;
        $category->sso = $request->sso;
        $category->price = $request->price;
        $category->save();

        return $category;
    }
}
