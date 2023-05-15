<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Type;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $angsurans = Angsuran::latest()->paginate(1);
        return view ('angsuran.index' , compact('angsurans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=type::all();
        return view('angsuran.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request , Angsuran $angsuran)
    {
        $this->validate($request, [
            'nm_angsuran' => 'required|regex:/^[a-zA-Z\s]+$/|unique:angsurans,nm_angsuran,'.$angsuran->id,
            'jenis' => 'required',
            ] , [
                'nm_angsuran.required'=>'nama angsuran harus di isi',
                'nm_angsuran.regex'=>'harus berupa character',
            ]);
            Angsuran::create([
            'nm_angsuran' => $request->nm_angsuran,
            'jenis' => $request->jenis   ,
            ]);
           //redirect to index
        return redirect()->route('angsuran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function show(Angsuran $angsuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function edit(Angsuran $angsuran)
    {
        $types = type::all();
        return view('angsuran.edit', compact('angsuran', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angsuran $angsuran)
    {
        try{
        $this->validate($request, [
            'nm_angsuran' => 'required|unique:angsurans,nm_angsuran,'.$angsuran->id,
            'jenis' => 'required',
            ] , [
                'nm_angsuran.required'=>'nama angsuran harus di isi',
            ]);
            $angsuran->update([
            'nm_angsuran' => $request->nm_angsuran,
            'jenis' => $request->jenis,
            ]);

            //redirect to index
        return redirect()->route('officer.index')->with(['success' => 'Data Berhasil Diubah!']);
    } catch (\Illuminate\Database\QueryException $ex) {
        if ($ex->errorInfo[0] == '23000' && $ex->errorInfo[1] == '1451') {
            $message = "Tidak dapat menghapus data karena terdapat data yang terkait pada tabel yang lain.";
            return redirect()->back()->with(['error' => $message]);
        } else {
            throw $ex;

        }
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);

}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Angsuran $angsuran)
    {
        try {
            $angsuran->delete();
            return redirect()->route('angsuran.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (\Illuminate\Database\QueryException $ex) {
            if ($ex->errorInfo[0] == '23000' && $ex->errorInfo[1] == '1451') {
                $message = "Tidak dapat menghapus data karena terdapat data yang terkait pada tabel yang lain.";
                return redirect()->back()->with(['error' => $message]);
            } else {
                throw $ex;
            }
        }
    }
}
