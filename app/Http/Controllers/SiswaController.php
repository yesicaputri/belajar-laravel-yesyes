<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
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
        $dataSiswa = DB::table('siswa')->get();
        // statement diatas sama dengan SELECT * FROM siswa
        return view('student.index', compact('dataSiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.create');
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
        //     'nis' => 'required',
        //     'nama' => 'required',
        //     'alamat' => 'required',
        //     'jenis_kelamin' => 'required',
        // ]);
        $query = DB::table('siswa')->insert([
            "nomor_induk_siswa" => $request["nis"],
            "nama" => $request["nama"],
            "alamat" => $request["alamat"],
            "jenis_kelamin" => $request["jenis_kelamin"]
        ]);

        return redirect('/student');
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
        $showSiswaById = Db::table('siswa')->where('id', $id)->first();
        // diatas sama dengan SELECT * FROM siswa WHERE id = $id
        return view('student.show', compact('showSiswaById'));
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
        $showSiswaById = DB::table('siswa')->where('id', $id)->first();
        // diatas sama dengan SELECT * FROM siswa WHERE id = $id
        return view('student.edit', compact('showSiswaById'));
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
        $request->validate([
            'nomor_induk_siswa' => 'required | unique:siswa',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required'
        ]);
        $query = DB::table('siswa')
            ->where('id', $id)
            ->update([
            'nomor_induk_siswa' => $request["nis"],
            'nama' => $request["nama"],
            'alamat' => $request["alamat"],
            'jenis_kelamin' => $request["jenis_kelamin"],
        ]);
        return redirect('/student');
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
        $query = DB::table('siswa')->where('id', $id)->delete();

        return redirect('/student');
    }
}
