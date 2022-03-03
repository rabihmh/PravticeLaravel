<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table='offers';
    protected  $fillable=["name","price","photo","created-at","updated-at"];
    protected $hidden=["created-at","updated-at"];
}
