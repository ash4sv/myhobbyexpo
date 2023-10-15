<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoothSpecialPrice extends Model
{
    use HasFactory, SoftDeletes;

    public function booth()
    {
        return $this->belongsTo(Booth::class, 'booth_id', 'id');
    }
}
