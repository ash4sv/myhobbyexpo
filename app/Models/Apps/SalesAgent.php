<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesAgent extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'hall_id',
                'section_id',
                'name',
                'description',
                'status',
            ]);
        // Chain fluent methods for configuration options
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(BoothExhibitionBooked::class, 'sales_agent_id', 'id');
    }

    public function saveSalesAgent($agent, $request)
    {
        $agent->hall_id = $request->hall;
        $agent->section_id = $request->section;
        $agent->name = $request->name;
        $agent->description = $request->description;
        $agent->group = null;

        $status = false;
        if ($request->status == 'on') {
            $status = true;
        }

        $agent->status = $status;
        $agent->save();
    }
}
