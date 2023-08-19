<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->model = Video::query();
        $this->table = (new Video())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        $videos = $this->model->get();

        return view('user.video.index', [
            'data' => $videos,
        ]);
    }

    public function create()
    {
        if(Auth::user()->hasPermissionTo('video-create')){
            $users = User::all();

            return view('user.video.create', compact('users'));
        }

        return redirect()->route('video.index')->withErrors('Có lỗi xảy ra!');
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.index');
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
    public function destroy($id)
    {
        if(Auth::user()->hasPermissionTo('video-delete')){
            Video::find($id)->delete();

            return redirect()->route('video.index')->with('success', 'Xóa thành công');
        }

        return redirect()->route('video.index')->withErrors('Có lỗi xảy ra');
    }
}
