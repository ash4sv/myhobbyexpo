<?php

namespace App\Models\Apps\MHXCup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class RacerNickNameRegister extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'uniq',
                'nickname',
                'register',
                'shirt_zie',
            ]);
    }

    public function racer()
    {
        return $this->belongsTo(RacerRegister::class, 'racer_id', 'id');
    }
}
