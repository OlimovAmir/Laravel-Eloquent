<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $quarded = false;

    protected $fillable = [
        'name',
        'last_name',
        'patronymic',
        'position_id',
        'address_id',
        'passport_data',
        'photo_path',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }


}
