<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'sub_district_id',
        'office_name',
        'office_photo',
        'address',
        'email',
        'phone',
        'website',
        'status'
    ];

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function sub_district() {
        return $this->belongsTo(SubDistrict::class);
    }
}
