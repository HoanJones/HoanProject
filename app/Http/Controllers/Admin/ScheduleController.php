<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->model = Schedule::query();
        $this->table = (new Schedule())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        $data = Schedule::all();

        return view('admin.schedule.index', compact('data'));
    }

    public function create()
    {
        return view('admin.schedule.create');
    }

    public function store(CreateScheduleRequest $request)
    {
        
        $data= $request->validated();
        Schedule::create($data);
    
        return redirect()->route('schedule.index')->with('success', 'Sự kiện được thêm thành công!');
    }

    public function edit($id)
    {
        $data  = Schedule::find($id);
        return view('admin.schedule.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $schedule = Schedule::find($id);
        $schedule->update($data);

        return redirect()->route('schedule.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        if(Auth::user()->hasPermissionTo('schedule-delete')){
            Schedule::find($id)->delete();

            return redirect()->route('schedule.index')->with('success', 'Xóa thành công');
        }

        return redirect()->route('schedule.index')->withErrors('Có lỗi xảy ra');
    }
}
