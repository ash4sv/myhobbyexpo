<?php

namespace App\Models\Apps\MHXCup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RacingScoreBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'racing_categories_id',
        'racing_tracks_id',
        'line_1',
        'line_2',
        'line_3',
    ];

    public function mhxcuptrack()
    {
        return $this->belongsTo(RacingTrack::class, 'racing_tracks_id', 'id');
    }

    public function mhxscoreRacer_1()
    {
        return $this->belongsTo(RacingRacers::class, 'line_1', 'id');
    }

    public function mhxscoreRacer_2()
    {
        return $this->belongsTo(RacingRacers::class, 'line_2', 'id');
    }

    public function mhxscoreRacer_3()
    {
        return $this->belongsTo(RacingRacers::class, 'line_3', 'id');
    }

    public function mhxcupracing()
    {
        return $this->belongsTo(Racing::class, 'racings_id', 'id');
    }
}
