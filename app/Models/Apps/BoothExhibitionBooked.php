<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoothExhibitionBooked extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'inv_number',
        'inv_date',
        'vendor_id',
        'sales_agent_id',
        'inv_description',
        'add_on',
        'total',
        'fee',
        'payment_status',
    ];

    protected $guarded;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        /*->logOnly(['name', 'text'])*/;
        // Chain fluent methods for configuration options
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }
}
