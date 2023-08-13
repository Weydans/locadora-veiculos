<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'cars_id', 'date'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    protected function car()
    {
        return $this->hasOne(Car::class, 'id', 'cars_id');
    }
}
