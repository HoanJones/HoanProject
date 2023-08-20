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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;

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
/*
        if ( ! empty($data['event_name'])) {
            $data['event_name'] = Hash::make($data['event_name']);
        } else {
            $data['event_name'] = $event->event_name;
        }
        if ( ! empty($data['start_time'])) {
            $data['start_time'] = Hash::make($data['start_time']);
        } else {
            $data['start_time'] = $event->start_time;
        }
        if ( ! empty($data['end_time'])) {
            $data['end_time'] = Hash::make($data['start_time']);
        } else {
            $data['end_time'] = $event->end_time;
        }
        if ( ! empty($data['event_address'])) {
            $data['event_address'] = Hash::make($data['event_address']);
        } else {
            $data['event_address'] = $event->event_address;
        }
        if ( ! empty($data['member_quantity'])) {
            $data['member_quantity'] = Hash::make($data['member_quantity']);
        } else {
            $data['member_quantity'] = $event->member_quantity;
        }
*/   
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
