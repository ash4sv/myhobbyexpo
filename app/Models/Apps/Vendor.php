<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = [];

    protected $fillable = [
        'company',
        'roc_rob',
        'pic_name',
        'phone_num',
        'email',
        'social_media',
        'website',
        'image',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'company',
                'roc_rob',
                'pic_name',
                'phone_num',
                'email',
                'social_media',
                'website',
                'image',
            ]);
        // Chain fluent methods for configuration options
    }

    public function registeredBooth()
    {
        return $this->hasMany(BoothNumber::class, 'vendor_id', 'id');
    }

    public function booked()
    {
        return $this->hasMany(BoothExhibitionBooked::class, 'vendor_id', 'id');
    }

    public function registerBooth()
    {
        return $this->hasMany(BoothNumber::class, 'vendor_id', 'id');
    }
}
