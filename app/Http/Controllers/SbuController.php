<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sbu;
use App\Nota;
use App\PurchaseOrder;

class SbuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sbus = Sbu::all();
        return view('sbu.index', compact('sbus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sbu::create($request->all());
        return redirect('sbu');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $sbu = Sbu::where('id', $request->id)->firstOrFail();
        $sbu->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {        
        // Ketika menghapus sbu, maka akan menghapus semua purchase order pada sbu tersebut, dan menghapus nota yang dimiliki oleh masing masing purchase order
        $sbu = Sbu::findOrFail($request->id);
        $sbuInPO = PurchaseOrder::where('nama_sbu',$sbu->nama_sbu)->get();
        foreach ($sbuInPO as $sip) {
            $poInNota = Nota::where('id_po',$sip->po_number)->get();
            $poInNota->each->delete();
        }
        $sbuInPO->each->delete();
        $sbu->delete();
        return back();
    }
}
