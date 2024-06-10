<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function card(){
        return $this->belongsTo(Card::class);
    }

    public function flight(){
        return $this->belongsTo(Flight::class);
    }
}
