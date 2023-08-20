<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class EventController extends Controller
{
    //private object $model;
    //private string $table;
    public function __construct()
    {
        $this->model = Event::query();
        $this->table = (new Event())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        $data = Event::all();

        return view('admin.event.index', compact('data'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(CreateEventRequest $request)
    {
        
        $data= $request->validated();
        Event::create($data);
    
        return redirect()->route('event.index')->with('success', 'Sự kiện được thêm thành công!');
    }

    public function edit($id)
    {
        $data  = Event::find($id);
        return view('admin.event.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $event = Event::find($id);
        $event->update($data);

        return redirect()->route('event.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        if(Auth::user()->hasPermissionTo('event-delete')){
            Event::find($id)->delete();

            return redirect()->route('event.index')->with('success', 'Xóa thành công');
        }

        return redirect()->route('event.index')->withErrors('Có lỗi xảy ra');
    }
}
