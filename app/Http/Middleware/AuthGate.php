<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use App\Models\AccountUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AuthGate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $user = Auth::user();
        if($user) {
            $roles = Role::with('permission')->get();
            $permissionArray = [];
            foreach($roles as $role) {
                foreach ($role->permissions as $permission) {
                    $permissionArray[$permission->name][] = $role->id;
                }
            }
            foreach ($permissionArray as $name => $roles) {
                Gate::define($name, function(User $user) use ($roles) {
                    return in_array($user->role_id, $roles);
                });
            }
        }
        return $next($request);
        
    }
}
