<?php

namespace App\Models\Apps\MHXCup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RacingRacers extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'racer_registers_id',
        'racing_categories_id',
        'racer_name',
        'slot_1',
        'slot_2',
        'slot_3',
        'slot_4',
        'slot_5',
        'slot_6',
        'slot_7',
        'slot_8',
        'slot_9',
        'slot_10',
        'slot_11',
        'slot_12',
        'slot_13',
        'slot_14',
        'slot_15',
        'slot_16',
        'slot_17',
        'slot_18',
        'slot_19',
        'slot_20',
    ];

    protected $guarded = [];

    public function mhxcupcategory()
    {
        return $this->belongsTo(RacingCategory::class, 'racing_categories_id', 'id');
    }

    public function mhxregistered()
    {
        return $this->belongsTo(RacerRegister::class, 'racer_registers_id', 'id');
    }

    public function mhxraces1()
    {
        return $this->hasMany(Racing::class, 'racer_1', 'id');
    }

    public function mhxraces2()
    {
        return $this->hasMany(Racing::class, 'racer_2', 'id');
    }

    public function mhxraces3()
    {
        return $this->hasMany(Racing::class, 'racer_3', 'id');
    }
}
