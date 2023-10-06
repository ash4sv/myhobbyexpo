<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoothNumber extends Model
{
    use HasFactory, SoftDeletes,  LogsActivity;

    protected $guarded = [];

    protected $fillable = [
        'section_id',
        'vendor_id',
        'booth_number',
        'description',
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

    public function booths()
    {
        return $this->belongsToMany(Booth::class)->withTimestamps();
    }

    public function vendor()
    {
        return $this->belongsTo( Vendor::class,'vendor_id', 'id');
    }
}
