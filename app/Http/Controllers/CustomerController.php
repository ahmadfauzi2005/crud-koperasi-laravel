<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = Customer::latest()->paginate(1);
        return view ('customer.index' , compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|alpha',
            'jk' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no' => 'required|unique:customers|max:12|min:12',
            'tgl' => 'required|date_format:Y-m-d',
        ], [
            'jk.required'=>'harap di isi',
            'nama.required'=>'nama harus disi ',
            'nama.alpha'=>'harus berupa character',
            'image.required'=>'image harus di isi',
            'no.required'=>'no telephone harus di isi',
            'tgl.required'=>'tanggal tidak boleh kosong',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/customer', $image->hashName());

        $tgl_formatted = date('d-m-Y', strtotime($request->tgl));
        if (strtotime($request->tgl) > time()) {
            return redirect()->back()->withInput()->withErrors(['tgl' => 'Tanggal tidak valid !']);
        }

        //create post
        Customer::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'image' => $image->hashName(),
            'no' => $request->no,
            'tgl' => $tgl_formatted,
        ]);

        //redirect to index
        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Disimpan!']);



}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        try{
        $this->validate($request, [
            'nama' => 'required',
            'jk' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no' => 'required|unique:customers,no,'.$customer->id.'|max:12|min:12',
            'tgl' => 'required|date_format:Y-m-d',
        ] , [
            'nama.required'=>'Nama harus di isi',
            'image.required'=>'image harus di isi',
            'no.required'=>'no telephone harus di isi',
            'tgl.required'=>'tanggal harus di isi',
        ]);
        $type->update([
            'id_jenis' => $request->id_jenis,
            'jenis' => $request->jenis,
        ]);

        //redirect to index
        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Diubah!']);
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
            //check if image is uploaded
            if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/customer', $image->hashName());
            //delete old image
            Storage::delete('public/customer/'.$customer->image);

            $tgl_formatted = date('d-m-Y', strtotime($request->tgl));
            if (strtotime($request->tgl) > time()) {
                return redirect()->back()->withInput()->withErrors(['tgl' => 'Tanggal tidak valid !']);
            }
            //update post with new image
            $customer->update([
                'nama' => $request->nama,
                'jk' => $request->jk,
                'image' => $image->hashName(),
                'no' => $request->no,
                'tgl' => $tgl_formatted,

            ]);

            } else {
                $tgl_formatted = date('d-m-Y', strtotime($request->tgl));
            //update post without image
            $customer->update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'no' => $request->no,
            'tgl' => $tgl_formatted,
            ]);
            }
            //redirect to index
            return redirect()->route('customer.index')->with(['success' => 'Data
           Berhasil Diubah!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer>
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
    try {
 $customer->delete();
 Storage::delete('public/customer/'. $customer->image);
        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Dihapus!']);
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
