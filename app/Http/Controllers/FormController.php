<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;

class FormController extends Controller
{
    public function index()
    {
        return view('approval.form');
    }

    public function store(Request $request)
    {
        $insert = DB::table('approval')->insert([
            'name'          => $request->name,
            'birth_date'    => $request->birth_date,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        Alert::success('Success Title', 'Berhasil menyimpan Data');
        return redirect()->back();
    }

    public function index_approval()
    {
        $data = DB::table('approval')->get();

        return view('approval.index', compact('data'));
    }

    public function approve($id)
    {
        $data = DB::table('approval')->where('id', $id)->update(['status' => 'approved']);

        Alert::success('Success Title', 'Berhasil Menyetujui');
        return redirect()->back();
    }

    public function reject($id)
    {
        $data = DB::table('approval')->where('id', $id)->update(['status' => 'reject']);

        Alert::success('Success Title', 'Berhasil Menolak');
        return redirect()->back();
    }

    public function index_history()
    {
        $data = DB::table('approval')->where('status', 'approved')->get();

        return view('approval.history', compact('data'));
    }
}
