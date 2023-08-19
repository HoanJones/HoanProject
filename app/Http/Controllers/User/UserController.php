<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        $user = $this->model->where('id', Auth::user()->id)
                            ->firstOrFail();

        return view('user.profile.index', [
            'data' => $user,
        ]);
    }

    public function edit(User $profile)
    {
        if ($profile->id !== Auth::user()->id) {
            return redirect()->route('profile.index')
                             ->withErrors('You do not have permission to edit this user');
        }

        return view('user.profile.edit', [
            'data' => $profile,
        ]);
    }

    public function update(UpdateUserRequest $request, User $profile)
    {
        if ($profile->id !== Auth::user()->id) {
            return redirect()->route('profile.index')
                             ->withErrors('You do not have permission to edit this user');
        }

        $arr             = $request->validated();
        $arr['birthday'] = date('Y-m-d H:i:s', strtotime($request->birthday));

        $object = $this->model->find(Auth::user()->id);
        $object->fill($arr);
        $object->save();

        return redirect()->route('profile.index')->with('success', 'Lưu thành công!');
    }
}
