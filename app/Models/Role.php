<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Role extends SpatieRole
{
    use HasFactory;
    // Các thuộc tính, phương thức khác của model Role
    protected $fillable = ['name'];
    
    /**
     * The permission that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permission(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }
    /*
    public function getDatadb()
    {
        return DB::table('roles')
            ->where('id', Auth::id())
            ->get();
    }
    */
}
