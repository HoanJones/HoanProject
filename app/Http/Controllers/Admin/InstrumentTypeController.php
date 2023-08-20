<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateIntrumentTypeRequest;
use App\Models\InstrumentType;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstrumentTypeController extends Controller
{
    public function __construct()
    {
        $this->model = InstrumentType::query();
        $this->table = (new InstrumentType())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        $data = InstrumentType::all();

        return view('admin.instrument_type.index', compact('data'));
    }

    public function create()
    {
        return view('admin.instrument_type.create');
    }

    public function store(CreateIntrumentTypeRequest $request)
    {
        
        $data= $request->validated();
        InstrumentType::create($data);
    
        return redirect()->route('instrument_type.index')->with('success', 'Sự kiện được thêm thành công!');
    }

    public function edit($id)
    {
        $data  = InstrumentType::find($id);
        return view('admin.instrument_type.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $instrument_type = InstrumentType::find($id);
        $instrument_type->update($data);
        
        return redirect()->route('instrument_type.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        if(Auth::user()->hasPermissionTo('instrument_type-delete')){
            Instrument_Type::find($id)->delete();

            return redirect()->route('instrument_type.index')->with('success', 'Xóa thành công');
        }

        return redirect()->route('instrument_type.index')->withErrors('Có lỗi xảy ra');
    }
}
