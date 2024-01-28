<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = ['eventID','name'];
        
    public function events(){
        return $this->belongsTo(Event::class);
    }
}
