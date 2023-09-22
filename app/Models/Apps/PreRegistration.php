<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_company',
        'person_in_charge',
        'contact_no',
        'email',
        'selection_in',
        'barred_size',
        'shell_scheme',
        'basic_lot',
    ];

    protected $guarded;
}
