<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->model = User::query();
        $this->table = (new User())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        $data = User::select('*')->paginate(10);

        return view('admin.usermanagement.index', compact('data'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.usermanagement.create', compact(['roles']));
    }

    public function store(CreateUserRequest $request)
    {
        $data             = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['birthday'] = date('Y-m-d H:i:s', strtotime($request->birthday));
        $data['role']     = $request->roles[0];
        $user             = User::create($data);
        $user->assignRole($request->input('roles'));

        return redirect()->route('usermanagement.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $data  = User::find($id);
        $roles = Role::all();

        return view('admin.usermanagement.edit', compact('data', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        if ( ! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $user->password;
        }
        $data['birthday'] = date('Y-m-d H:i:s', strtotime($request->birthday));
        $data['role']     = $request->roles[0];
        $user->update($data);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('usermanagement.index')->with('success', 'thành công');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('usermanagement.index')->with('success', 'thành công');
    }
}
