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

    public function __construct()
    {
        $this->model = User::query();
        $this->table = (new User())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index(User $user)
    {
        return view('user.index');
    }

    public function edit(AccountUser $user)
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

    public function update(Request $request, AccountUser $user)
    {
        $data = $request->except(['_token', '_method']);
        DB::table('users')->update($data);

        return redirect()->route('home');
    }
    /*
    public function destroy(Request $request, AccountUser $user) {

    }
    */
}
