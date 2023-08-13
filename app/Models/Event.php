<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    use HasFactory;

    public function executiveBoard(){
        return $this->belongsTo(Executive_Board::class,'executive_board_id','id');
    }
}
