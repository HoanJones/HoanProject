<?php

namespace App\Http\Controllers;

use App\Models\AccountUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class UserController extends Controller
{
    public function index(AccountUser $user)
    {
        $users = $user->getDatadb();

        return view('home.index', [
            'id' => $users[0]->id,
            'role' => $users[0]->role,
            'name' => $users[0]->name,
            'birthday' => $users[0]->birthday,
            'sex' => $users[0]->sex,
            'address' => $users[0]->address,
            'email' => $users[0]->email,
            'phone_number' => $users[0]->phone_number,
            'job' => $users[0]->job,
            'work_place' => $users[0]->work_place,
        ]);
    }

    public function edit(AccountUser $user)
    {
        $users = $user->getDatadb();

        return view('home.edit', [
            'name' => $users[0]->name,
            'birthday' => $users[0]->birthday,
            'sex' => $users[0]->sex,
            'address' => $users[0]->address,
            'email' => $users[0]->email,
            'phone_number' => $users[0]->phone_number,
            'job' => $users[0]->job,
            'work_place' => $users[0]->work_place,
        ]);
    }

    public function update(Request $request,AccountUser $user)
    {
            $data = $request->except(['_token','_method']);
            DB::table('users')->update($data);
            return redirect()->route('home');
    }
    /*
    public function destroy(Request $request, AccountUser $user) {

    }
    */
}
