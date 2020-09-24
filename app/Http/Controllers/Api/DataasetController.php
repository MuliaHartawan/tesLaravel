<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Dataaset;
use App\Http\Resource\DataasetResource;
use Illuminate\Http\Request;

class DataasetController extends Controller
{

    public function index()
    {
        //mengambil semua data yang di data collection
        $dataaset = Dataaset::get();

        return DataasetResource::latest()->collection($dataaset);
    }

    public function show($id)
    {
        //mengambil data berdasarkan id
        $dataaset = Dataaset::find($id);

        return new DataasetResource($dataaset);
    }

    public function update(Request $request, Datasset $dataaset)
    {
        //mengirim request untuk $dataaset
        $dataaset->update([
            'kode_aset' => $request->kode_aset,
            'nama_aset' => $request->nama_aset,
            'jumlah' =>$request->jumlah,
            'merk' => $request->merk,
            'desc' => $request->desc,
        ]);
        
        return new DataasetResource($dataaset);
    }

    public function store(Request $request){

        //validasi apapun di dalam request
        $this->validate($request, [
            'kode_aset' => 'required|unique',
            'nama_aset' => 'required',
            'jumlah' => 'required|numeric',
            'merk' => 'required'
        ]); 

        //mengirim request untuk $dataaset
        $dataaset = Dataaset::create([
        'user_id' => auth()->id(),
        'kode_aset' => $request->kode_aset,
        'nama_aset' => $request->nama_aset,
        'jumlah' =>$request->jumlah,
        'merk' => $request->merk,
        'desc' => $request->desc,
    ]);
        
        return new DataasetResource($dataaset);
    }

    public function delete($id)
    {
        //menanghapus data
        $dataaset = Dataaset::find($id);

        $dataaset->delete();

        return new DataasetResource($dataaset);
        
    }
    
}
