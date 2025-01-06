<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'zip_code'
    ];

    public function sub_districts() {
        return $this->hasMany(SubDistrict::class);
    }

    public function contacts() {
        return $this->hasMany(Contact::class);
    }
}
