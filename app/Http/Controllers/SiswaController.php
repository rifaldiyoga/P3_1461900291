<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Siswa;
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
        $data = DB::select('select a.*, c.nama as "nama_guru", c.mengajar from siswa a join kelas b on b.id_siswa = a.id join guru c on c.id = b.id_guru');
        return view('index0291', [
            'siswa' => $data 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $guru = Guru::all();
        return view('create0291', ['guru' => $guru]);
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
        $data = $request->all();

        $siswa['nama'] = $data['nama'];
        $siswa['alamat'] = $data['alamat'];

        $id = Siswa::insertGetId($siswa);

        $kelas['id_guru'] = $data['guru'];
        $kelas['id_siswa'] = $id; 
        Kelas::create($kelas);

        return redirect('');

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
        $data = Siswa::find($id);
        $guru = Guru::all();
        return view('edit0291', [
            'data' => $data,
            'guru' => $guru
        ]);
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

        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return redirect('');

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

        $kelas = Kelas::where('id_siswa', $id);
        $kelas->delete();

        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('');
    }

    public function search(Request $request){
        $data = DB::select('select a.*, c.nama as "nama_guru", c.mengajar from siswa a join kelas b on b.id_siswa = a.id join guru c on c.id = b.id_guru where a.nama like "%'.$request->cari.'%" or alamat like "%'.$request->cari.'%"');
        return view('index0291', [
            'siswa' => $data 
        ]);
    }
}
