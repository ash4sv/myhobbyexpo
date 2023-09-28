<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreRegistration extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'name_company',
        'person_in_charge',
        'contact_no',
        'email',
        'selection_in',
        'barred_size',
        'shell_scheme',
        'basic_lot',
    ];

    protected $guarded;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'text']);
        // Chain fluent methods for configuration options
    }
}
