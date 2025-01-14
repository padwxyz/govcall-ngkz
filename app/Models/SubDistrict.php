<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name',
        'zip_code'
    ];

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function contacts() {
        return $this->hasMany(Contact::class);
    }
}
