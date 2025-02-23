<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dtr extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 
        'time_in_am',
        'time_out_am',
        'time_in_pm',
        'time_out_pm',
        'user_id']; 

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
