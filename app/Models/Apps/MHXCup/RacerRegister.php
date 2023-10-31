<?php

namespace App\Models\Apps\MHXCup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class RacerRegister extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'category',
                'price_category',
                'total_cost',
                'full_name',
                'identification_card_number',
                'phone_number',
                'email',
                'nickname',
                'team_group',
                'registration',
                'receipt',
                'approval',
            ]);
    }

    public function numberRegister()
    {
        return $this->hasMany(RacerNickNameRegister::class, 'racer_id', 'id');
    }
}
