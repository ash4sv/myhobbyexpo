<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booth extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = [];

    protected $fillable = [
        'section_id',
        'booth_number_id',
        'booth_type',
        'normal_price',
        'early_bird_price',
        'early_bird_expiry_date',
        'status',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        /*->logOnly(['name', 'text'])*/;
        // Chain fluent methods for configuration options
    }

    public function sections()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function numbers()
    {
        return $this->hasMany(BoothNumber::class, 'booth_number_id', 'id');
    }

    public function boothNumbers()
    {
        return $this->belongsToMany(BoothNumber::class)->withTimestamps();
    }

    /*public function getNormalPriceAttribute($value) {
    	$newform = "RM".$value;
    	return $newform;
    }

    public function getEarlyBirdPriceAttribute($value) {
    	$newform = "RM".$value;
    	return $newform;
    }*/
}