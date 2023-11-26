<?php

namespace App\Models\Apps\MHXCup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Racing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    public function mhxcategory()
    {
        return $this->belongsTo(RacingCategory::class, 'racing_categories_id', 'id');
    }

    public function mhxcupctrack()
    {
        return $this->belongsTo(RacingTrack::class, 'racing_tracks_id', 'id');
    }

    public function mhxracer1()
    {
        return $this->belongsTo(RacingRacers::class, 'racer_1', 'id');
    }

    public function mhxracer2()
    {
        return $this->belongsTo(RacingRacers::class, 'racer_2', 'id');
    }

    public function mhxracer3()
    {
        return $this->belongsTo(RacingRacers::class, 'racer_3', 'id');
    }
}
