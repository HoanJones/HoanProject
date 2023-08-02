<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Executive_Board extends Model
{
    use HasFactory;
    protected $table = 'executive__boards';
    protected $fillable = [
		'level',
        'forte',
        'term'
	];
    public function getDatadb()
    {
        return DB::table('executive__boards')
            ->where('id', Auth::id())
            ->get();
    }
}
