<?php

namespace App\Models\Apps\MHXCup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RacingResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'racings_id',
        'racing_racers_1',
        'racing_racers_2',
    ];

    protected $guarded = [
        'racings_id',
        'racing_racers_1',
        'racing_racers_2',
    ];

    public function mhxcupracing()
    {
        return $this->belongsTo(Racing::class, 'racings_id', 'id');
    }

    public function mhxraces1()
    {
        return $this->belongsTo(RacingRacers::class, 'racing_racers_1', 'id');
    }

    public function mhxraces2()
    {
        return $this->belongsTo(RacingRacers::class, 'racing_racers_2', 'id');
    }

    public function mhxraces3()
    {
        return $this->belongsTo(RacingRacers::class, 'racing_racers_3', 'id');
    }
}
