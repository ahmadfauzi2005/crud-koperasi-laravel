<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Officer::latest()->paginate(1);
        return view ('officer.index' , compact('officers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('officer.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Officer $officer ,   Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'pasword' => 'required|unique:officers,pasword,'.$officer->id,
            'nama_lkp' => 'required',
            'contact' => 'required|unique:officers|max:12',
            'pejabat' => 'required',
            ] , [
                'nama.required'=>'Nama harus di isi',
                'pasword.required'=>'pasword harus di isi',
                'nama_lkp.required'=>'nama lengkap harus di isi',
                'contact.required'=>'contact harus di isi',
            ]);
            Officer::create([
            'nama' => $request->nama,
            'pasword' => $request->pasword,
            'nama_lkp' => $request->nama_lkp,
            'contact' => $request->contact,
            'pejabat' => $request->pejabat
            ]);
           //redirect to index
        return redirect()->route('officer.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(Officer $officer)
    {
        return view('officer.edit', compact('officer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Officer $officer)
    {
        try{
        $this->validate($request, [
            'nama' => 'required',
            'pasword' => 'required|unique:officers,pasword,'.$officer->id,
            'nama_lkp' => 'required',
            'contact' => 'required|unique:officers,contact,'.$officer->id.'|max:12',
            'pejabat' => 'required'
            ] , [
                'nama.required'=>'Nama harus di isi',
                'pasword.required'=>'pasword harus di isi',
                'nama_lkp.required'=>'nama lengkap harus di isi',
                'contact.required'=>'contact harus di isi',
            ]);
            $officer->update([
            'nama' => $request->nama,
            'pasword' => $request->pasword,
            'nama_lkp' => $request->nama_lkp,
            'contact' => $request->contact,
            'pejabat' => $request->pejabat,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        try {
            $officer->delete();
            return redirect()->route('officer.index')->with(['success' => 'Data Berhasil Dihapus!']);
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
