<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class VideoController extends Controller
{
    private object $model;
    public function __construct()
    {
        $this->model = Video::query();
        $this->table = (new Video())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        $videos = DB::table('videos')
        ->join('users','videos.user_id','=','users.id')
        ->addSelect([
            'videos.id',
            'videos.name',
            'videos.link',
            'users.name as user_name'
        ])
        ->get();

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

    public function store(CreateVideoRequest $request)
    {
        $data= $request->all();
        Video::create($data);

        return redirect()->route('video.index')->with('success', 'Sự kiện được thêm thành công!');
    }

    public function edit($id)
    {
        $users = User::all();
        $videos = DB::table('videos')
        ->join('users','videos.user_id','=','users.id')
        ->where('videos.id','=',$id)
        ->addSelect([
            'videos.id',
            'videos.name',
            'videos.link',
            'users.name as user_name',
            'users.id as user_id',
        ])
        ->get()->first();
        
        return view('user.video.edit', [
            'users' => $users,
            'data' => $videos,
        ]);
    }

    public function update(UpdateVideoRequest $request, $id)
    {
        $data = $request->all();
        $video = Video::find($id);
        $video->update($data);

        return redirect()->route('video.index')->with('success', 'Sửa thành công');
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
