<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FluteBorrowing;
use App\Models\Instrument;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Throwable;

class FluteBorrowingController extends Controller
{
    public function __construct()
    {
        View::share('title', 'MƯỢN TRẢ NHẠC CỤ');
    }

    public function index()
    {
        $data = DB::table('instruments')
                  ->join('users', 'users.id', '=', 'instruments.user_id')
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
                  ->join('users', 'users.id', '=', 'instruments.user_id')
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
        DB::beginTransaction();
        try {
            $arr                   = $request->all();
            $arr['user_id']        = Auth::id();
            $arr['instrument_id']  = $id;
            $arr['borrowing_date'] = date('Y-m-d H:i:s', strtotime($request->borrowing_date));
            $arr['due_date']       = date('Y-m-d H:i:s', strtotime($request->due_date));

            $instrument = Instrument::find($id);
            if ( ! $instrument) {
                throw new \Exception('No instrument');
            }
            if ($instrument->status != 1) {
                throw new \Exception('Nhạc cụ này không thể mượn');
            }

            $instrument->status = 2;
            $instrument->save();

            FluteBorrowing::create($arr);

            DB::commit();

            return redirect('flute-borrowing')->with('success', 'Thuê thành công, hãy đợi admin xác nhận!');
        } catch (Throwable $e) {
            DB::rollBack();

            return redirect('flute-borrowing')->withErrors('Thuê thành công, hãy đợi admin xác nhận!');
        }
    }

    public function borrowList()
    {
        $data = DB::table('flute_borrowings')
                  ->join('users', 'users.id', '=', 'flute_borrowings.user_id')
                  ->join('instruments', 'flute_borrowings.instrument_id', '=', 'instruments.id')
                  ->join('instrument_types', 'instrument_type_id', '=', 'instrument_types.id')
                  ->where('flute_borrowings.user_id', '=', Auth::id())
                  ->addSelect([
                      'flute_borrowings.id',
                      'instrument_types.name as instrument_type_name',
                      'instruments.name as instrument_name',
                      'users.name as user_name',
                      'instruments.status',
                      'flute_borrowings.borrowing_date',
                      'flute_borrowings.due_date',
                  ])->paginate(10);

        return view('user.flute-borrowing.borrow-list', compact('data'));
    }
}
