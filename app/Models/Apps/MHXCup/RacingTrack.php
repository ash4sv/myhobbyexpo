<?php

namespace App\Models\Apps\MHXCup;

use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RacingTrack extends Model
{
    use HasFactory, SoftDeletes;

    public function mhxcupcategory()
    {
        return $this->belongsTo(RacingCategory::class, 'racing_categories_id', 'id');
    }

    public function mhxcupracing()
    {
        return $this->hasMany(Racing::class, 'racing_tracks_id', 'id');
    }

    public function mhxcupscore()
    {
        return $this->hasMany(RacingScoreBoard::class, 'racing_tracks_id', 'id');
    }

    public function saveRacingTrack($track, $request)
    {
        $track->racing_categories_id = $request->racing_categories_id;
        $track->track_name = $request->track_name;
        if ($request->hasFile('track_layouts')) {
            $track_layouts = ImageUploader::uploadSingleImage($request->file('track_layouts'), 'assets/upload/', 'mhxcup_track_layouts');;
        } else {
            $track_layouts = $track->track_layouts;
        }
        $track->track_layouts = $track_layouts;
        $track->save();
    }
}
