<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends SpatiePermission
{
    use HasFactory;
    // Các thuộc tính, phương thức khác của model Permission
    protected $fillable = ['name'];

    /**
     * The roles that belong to the Permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}