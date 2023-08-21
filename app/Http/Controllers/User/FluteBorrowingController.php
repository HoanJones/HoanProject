<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FluteBorrowingController extends Controller
{
    public function __construct()
    {
        View::share('title', 'MƯỢN TRẢ NHẠC CỤ');
    }

    public function index()
    {
        $data = DB::table('instruments')
                  ->join('users', 'users.id', '=', 'instruments.id')
                  ->join('instrument_types', 'instrument_type_id', '=', 'instrument_types.id')
                  ->addSelect([
                      'instruments.id',
                      'instrument_types.name as instrument_type_name',
                      'instruments.name as instrument_name',
                      'users.name as user_name',
                      'instruments.status',
                  ])
                  ->paginate(10);

        return view('user.flute-borrowing.index', compact('data'));
    }

    public function borrow($id)
    {
        $data = DB::table('instruments')
                  ->join('users', 'users.id', '=', 'instruments.id')
                  ->join('instrument_types', 'instrument_type_id', '=', 'instrument_types.id')
                  ->where('instruments.id', '=', $id)
                  ->addSelect([
                      'instruments.id',
                      'instrument_types.name as instrument_type_name',
                      'instruments.name as instrument_name',
                      'users.name as user_name',
                      'instruments.status',
                  ])->get()->first();

        return view('user.flute-borrowing.borrow', compact('data'));
    }

    public function borrowing(Request $request, $id)
    {
        $arr = $request->all();
        $arr['user_id'] = Auth::id();
    }
}
