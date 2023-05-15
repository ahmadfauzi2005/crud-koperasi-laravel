<?php

namespace App\Http\Controllers;

use App\Models\Pinjamann;
use App\Models\Customer;
use App\Models\Officer;
use App\Models\Angsuran;
use Illuminate\Http\Request;

class PinjamannController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjamanns = Pinjamann::latest()->paginate(1);
        return view ('pinjaman.index' , compact('pinjamanns' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=Customer::all();
        $officers=Officer::all();
        $angsurans=Angsuran::all();
        return view('pinjaman.create' , compact('customers' , 'officers' , 'angsurans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Pinjamann $pinjaman ,   Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|unique:pinjamanns',
            'anggota' => 'required',
            'angsuran' => 'required',
            'petugas' => 'required',
            ] , [
                'kode.required'=>'kode harus di isi',
            ]);
            Pinjamann::create([
            'kode' => $request->kode,
            'anggota' => $request->anggota,
            'angsuran' => $request->angsuran,
            'petugas' => $request->petugas,
            ]);
           //redirect to index
        return redirect()->route('pinjaman.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjamann  $pinjamann
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjamann $pinjamann)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjamann  $pinjamann
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjamann $pinjaman)
    {
        $customers=Customer::all();
        $officers=Officer::all();
        $angsurans=Angsuran::all();
        return view('pinjaman.edit' , compact('customers' , 'officers' , 'angsurans','pinjaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pinjamann  $pinjamann
     * @return \Illuminate\Http\Response
     */
    public function update( Pinjamann $pinjaman , Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|unique:pinjamanns,kode,'.$pinjaman->id,
            'anggota' => 'required',
            'angsuran' => 'required',
            'petugas' => 'required',
            ] , [
                'kode.required'=>'kode harus di isi',
            ]);
            $pinjaman->update([
            'kode' => $request->kode,
            'anggota' => $request->anggota,
            'angsuran' => $request->angsuran,
            'petugas' => $request->petugas,
            ]);

            //redirect to index
            return redirect()->route('pinjaman.index')->with(['success' => 'Data
           Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pinjamann  $pinjamann
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjamann $pinjaman)
    {
        $pinjaman->delete();
        return redirect()->route('pinjaman.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
}
