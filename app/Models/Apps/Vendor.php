<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    public function registeredBooth()
    {
        return $this->hasMany(BoothNumber::class, 'vendor_id', 'id');
    }

    public function booked()
    {
        return $this->hasMany(BoothExhibitionBooked::class, 'vendor_id', 'id');
    }

    public function registerBooth()
    {
        return $this->hasMany(BoothNumber::class, 'vendor_id', 'id');
    }
}
