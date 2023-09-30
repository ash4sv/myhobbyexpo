<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoothNumber extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'category_id',
        'vendor_id',
        'name',
        'slug',
        'description',
        'status',
    ];

    protected $guarded = [
        'category_id',
        'vendor_id',
        'name',
        'slug',
        'description',
        'status',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        /*->logOnly(['name'])*/;
        // Chain fluent methods for configuration options
    }

    public function type()
    {
        return $this->belongsTo(BoothType::class, 'category_id', 'id');
    }
}
