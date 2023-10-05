<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        /*->logOnly(['name', 'text'])*/;
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
}
