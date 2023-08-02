<?php

namespace App\Http\Controllers;

use App\Models\Executive_Board;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExecutiveBoardController extends Controller
{
    public function index(Executive_Board $executive_board)
    {
        $executive_boards = $executive_board->getDatadb();

        return view('home.index', [
            'id' => $executive_boards[0]->id,
            'user_id' => $executive_boards[0]->user_id,
            'level' => $executive_boards[0]->level,
            'forte' => $executive_boards[0]->forte,
            'term' => $executive_boards[0]->term,
        ]);
    }

    public function edit(Executive_Board $executive_board)
    {
        $executive_boards = $executive_board->getDatadb();

        return view('home.admin_edit', [
            'level' => $executive_boards[0]->level,
            'forte' => $executive_boards[0]->forte,
            'term' => $executive_boards[0]->term,
        ]);
    }

    public function update(Request $request, Executive_Board $executive_board)
    {
            $data = $request->except(['_token','_method']);
            DB::table('executive__boards')->update($data);
            return redirect()->route('home');
    }
}
