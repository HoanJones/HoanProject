<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatSheetRequest;
use App\Http\Requests\UpdateSheetRequest;
use App\Models\Sheet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class SheetController extends Controller
{
    private object $model;
    public function __construct()
    {
        $this->model = Sheet::query();
        $this->table = (new Sheet())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        $sheets = DB::table('sheets')
        ->join('users','sheets.user_id','=','users.id')
        ->addSelect([
            'sheets.id',
            'sheets.name',
            'sheets.sheet_image',
            'users.name as user_name'
        ])
        ->get();

        return view('user.sheet.index', [
            'data' => $sheets,
        ]);
    }

    public function create()
    {
        if(Auth::user()->hasPermissionTo('sheet-create')){
            $users = User::all();

            return view('user.sheet.create', compact('users'));
        }

        return redirect()->route('sheet.index')->withErrors('Có lỗi xảy ra!');
    }

    public function store(CreatSheetRequest $request)
    {
        $data= $request->all();
        Sheet::create($data);

        return redirect()->route('sheet.index')->with('success', 'Sự kiện được thêm thành công!');
    }

    public function edit($id)
    {
        $users = User::all();
        $sheets = DB::table('sheets')
        ->join('users','sheets.user_id','=','users.id')
        ->where('sheets.id','=',$id)
        ->addSelect([
            'sheets.id',
            'sheets.name',
            'sheets.sheet_image',
            'users.name as user_name',
            'users.id as user_id',
        ])
        ->get()->first();
        
        return view('user.sheet.edit', [
            'users' => $users,
            'data' => $sheets,
        ]);
    }

    public function update(UpdateSheetRequest $request, $id)
    {
        $data = $request->all();
        $video = Sheet::find($id);
        $video->update($data);

        return redirect()->route('video.index')->with('success', 'Sửa thành công');

        
    }
    public function destroy($id)
    {
        if(Auth::user()->hasPermissionTo('sheet-delete')){
            Sheet::find($id)->delete();

            return redirect()->route('sheet.index')->with('success', 'Xóa thành công');
        }

        return redirect()->route('sheet.index')->withErrors('Có lỗi xảy ra');
    }
}
