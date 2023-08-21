<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FluteBorrowing;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FluteBorrowingManagementController extends Controller
{
    public function __construct()
    {
        View::share('title', 'QUẢN LÝ MƯỢN TRẢ NHẠC CỤ');
    }

    public function index()
    {
        $owner_name =
        $data = DB::table('flute_borrowings')
                  ->join('users as user_borrow', 'flute_borrowings.user_id', '=', 'user_borrow.id')
                  ->join('instruments', 'flute_borrowings.instrument_id', '=', 'instruments.id')
                  ->join('instrument_types', 'instrument_type_id', '=', 'instrument_types.id')
                  ->join('users as instrument_owner', 'instruments.user_id', '=', 'instrument_owner.id')
                  ->paginate(10, [
                      'flute_borrowings.id',
                      'instruments.id as instrument_id',
                      'instrument_types.name as instrument_type_name',
                      'instruments.name as instrument_name',
                      'user_borrow.name as user_borrow_name',
                      'instrument_owner.name as instrument_owner_name',
                      'instruments.status',
                      'flute_borrowings.borrowing_date',
                      'flute_borrowings.due_date',
                  ]);

        return view('admin.flute-borrowing-management.index', compact('data'));
    }

    public function acceptBorrow(Request $request, $id)
    {
        $instrument = Instrument::find($id);
        $instrument->status = 0;
        $instrument->save();

        return redirect('flute-borrowing-management')->with('success', 'Xác nhận thành công!');

    }

    public function rejectBorrow(Request $request, $id)
    {
        $instrument = Instrument::find($id);
        $instrument->status = 1;
        $instrument->save();

        FluteBorrowing::find($id)->delete();

        return redirect('flute-borrowing-management')->with('success', 'Từ chối thành công!');
    }
}
