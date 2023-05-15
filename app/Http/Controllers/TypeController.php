<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Officer;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::latest()->paginate(1);
        return view ('type.index' , compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Type $type ,  Request $request)
    {
        $this->validate($request, [
            'id_jenis' => 'required|unique:types,id_jenis,'.$type->id,
            'jenis' => 'required',
            ] , [
                'id_jenis.required'=>'id harus di isi',
                'jenis.required'=>'jenis harus di isi',
            ]);
            Type::create([
            'id_jenis' => $request->id_jenis,
            'jenis' => $request->jenis,
            ]);
           //redirect to index
        return redirect()->route('type.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Type $type)
    {
        try {
            $this->validate($request, [
                'id_jenis' => 'required|unique:types,id_jenis,'.$type->id,
                'jenis' => 'required',
            ], [
                'id_jenis.required'=>'id harus di isi',
                'jenis.required'=>'jenis harus di isi',
                'id_jenis.unique'=>'id sudah terdaftar',
            ]);

            $type->update([
                'id_jenis' => $request->id_jenis,
                'jenis' => $request->jenis,
            ]);

            //redirect to index
            return redirect()->route('type.index')->with(['success' => 'Data Berhasil Diubah!']);
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
    public function destroy(Type $type)
    {
        try {
            $type->delete();
            return redirect()->route('type.index')->with(['success' => 'Data Berhasil Dihapus!']);
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
