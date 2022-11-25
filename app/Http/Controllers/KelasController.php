<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // untuk mengambil data
        $dataKelas = DB::table('kelas')->get();
        // statement diatas sama dengan SELECT * FROM kelas
        return view('class.index', compact('dataKelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $request->validate([
        //     'id' => 'required',
        //     'nama_kelas' => 'required',
        //     'jurusan' => 'required',
        // ]);
        $query = DB::table('kelas')->insert([
            "id" => $request["id"],
            "nama_kelas" => $request["namakelas"],
            "jurusan" => $request["jurusan"],
        ]);

        return redirect('/class');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $showKelasById = DB::table('kelas')->where('id', $id)->first();
        // diatas sama dengan SELECT * FROM kelas WHERE id = $id
        return view('class.show', compact('showKelasById'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $showKelasById = DB::table('kelas')->where('id', $id)->first();
        // diatas sama dengan SELECT * FROM kelas WHERE id = $id
        return view('class.edit', compact('showKelasById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $request->validate([
        //     'id' => 'required | unique:kelas',
        //     'nama_kelas' => 'required',
        //     'jurusan' => 'required',
        // ]);
        $query = DB::table('kelas')
            ->where('id', $id)
            ->update([
            "id"            => $request["id"],
            "nama_kelas"    => $request["namakelas"],
            "jurusan"       => $request["jurusan"],
        ]);

        return redirect('/class');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $query = DB::table('kelas')->where('id', $id)->delete();

        return redirect('/class');
    }
}
