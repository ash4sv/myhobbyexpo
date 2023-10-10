<?php

namespace App\Models\Apps;

use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\Translation\t;

class Section extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = [];

    protected $fillable = [
        'hall_id',
        'name',
        'slug',
        'description',
        'poster',
        'layout',
        'status',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'hall_id',
                'name',
                'slug',
                'description',
                'poster',
                'layout',
                'status',
            ]);
        // Chain fluent methods for configuration options
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id', 'id');
    }

    public function booths()
    {
        return $this->hasMany(Booth::class, 'section_id', 'id');
    }

    public function numbers()
    {
        return $this->hasMany(BoothNumber::class, 'section_id', 'id');
    }

    public function agents()
    {
        return $this->hasMany(SalesAgent::class, 'section_id', 'id');
    }

    public function saveSection($section, $request)
    {
        if ($request->hasFile('poster')) {
            $poster = ImageUploader::uploadSingleImage($request->file('poster'), 'assets/upload/', 'section-poster');;
        } else {
            $poster = $section->poster;
        }

        if ($request->hasFile('layout')) {
            $layout = ImageUploader::uploadSingleImage($request->file('layout'), 'assets/upload/', 'section-layout');;
        } else {
            $layout = $section->layout;
        }

        $section->hall_id       = $request->hall;
        $section->name          = $request->name;
        $section->slug          = Str::slug($request->name);
        $section->description   = $request->description;
        $section->poster        = $poster;
        $section->layout        = $layout;

        $status = false;
        if ($request->status == 'on') {
            $status = true;
        }

        $comingSoon = false;
        if ($request->coming_soon == 'on') {
            $comingSoon = true;
        }

        $section->status        = $status;
        $section->coming_soon   = $comingSoon;
        $section->save();
    }
}
