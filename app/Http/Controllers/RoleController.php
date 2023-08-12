<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
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

        return view('role.index', compact('roles'));
    }

}
