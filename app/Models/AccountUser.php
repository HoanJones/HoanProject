<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AccountUser extends Authenticatable
{
    use HasFactory, HasRoles;
    
	protected $fillable = [
		'name',
        'birthday',
        'email',
        'sex',
        'address',
        'phone_number',
        'job',
        'work_place',
	];
    public function getDatadb()
    {
        return DB::table('users')
            ->where('id', Auth::id())
            ->get();
    }
}