<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FluteBorrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'instrument_id',
        'user_id',
        'borrowing_date',
        'due_date',
    ];
}
