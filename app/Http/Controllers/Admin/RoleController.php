<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Role::query();
        $this->table = (new Role())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        $roles = Role::all();

        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();

        return view('admin.role.create', compact('permission'));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.index');
    }

    public function show($id)
    {
        $role            = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=",
            "permissions.id")->where("role_has_permissions.role_id", $id)->get();

        return view('admin.role.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        $role            = Role::find($id);
        $permission      = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
                             ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                             ->all();

        return view('admin.role.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        try {
            $role = Role::find($id);
            $role->save();
            $role->syncPermissions($request->input('permission'));

            return redirect()->route('role.index');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại');
        }


    }

    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();

        return redirect()->route('role.index');
    }

}
