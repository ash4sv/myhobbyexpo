<?php

namespace App\Models\Apps;

use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hall extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'poster',
        'status',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'slug',
                'description',
                'poster',
                'status',
            ]);
        // Chain fluent methods for configuration options
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'hall_id', 'id');
    }

    public function agents()
    {
        return $this->hasMany(SalesAgent::class, 'hall_id', 'id');
    }

    public function saveHall($hall, $request)
    {
        if ($request->hasFile('image')) {
            $poster = ImageUploader::uploadSingleImage($request->file('image'), 'assets/upload/', 'hall');;
        } else {
            $poster = $hall->poster;
        }

        $status = false;
        if ($request->status == 'on') {
            $status = true;
        }

        $comingSoon = false;
        if ($request->coming_soon == 'on') {
            $comingSoon = true;
        }

        $hall->name             = $request->name;
        $hall->slug             = Str::slug($request->name);
        $hall->description      = $request->description;
        $hall->poster           = $poster;
        $hall->status           = $status;
        $hall->coming_soon      = $comingSoon;
        $hall->save();
    }
}
