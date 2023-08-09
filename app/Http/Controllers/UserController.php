<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    private object $model;
    private string $table;
    private object $currentUser;

    public function __construct()
    {
        $this->model = User::query();
        $this->table = (new User())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index(User $user)
    {
        $id           = Auth::user()->id;
        $role         = Auth::user()->role;
        $name         = Auth::user()->name;
        $birthday     = Auth::user()->birthday;
        $email        = Auth::user()->email;
        $gender       = Auth::user()->gender;
        $address      = Auth::user()->address;
        $phone_number = Auth::user()->phone_number;
        $job          = Auth::user()->job;
        $work_place   = Auth::user()->work_place;

        return view('user.index', [
            'id'           => $id,
            'role'         => $role,
            'name'         => $name,
            'birthday'     => $birthday,
            'email'        => $email,
            'gender'       => $gender,
            'address'      => $address,
            'phone_number' => $phone_number,
            'job'          => $job,
            'work_place'   => $work_place,
        ]);
    }

    public function edit(User $user)
    {
        $users = $user->getDatadb();

        return view('home.edit', [
            'name'         => $users[0]->name,
            'birthday'     => $users[0]->birthday,
            'sex'          => $users[0]->sex,
            'address'      => $users[0]->address,
            'email'        => $users[0]->email,
            'phone_number' => $users[0]->phone_number,
            'job'          => $users[0]->job,
            'work_place'   => $users[0]->work_place,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->except(['_token', '_method']);
        DB::table('users')->update($data);

        return redirect()->route('home');
    }
}
