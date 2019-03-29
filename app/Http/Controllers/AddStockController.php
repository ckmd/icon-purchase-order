<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\AddStock;
use App\PurchaseOrder;
use App\Sbu;
use App\Item;
use App\Nota;

class AddStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sbus = Sbu::all();
        $items = Item::all();
        $report = null;
        return view('add-stock.index', compact('report','sbus','items'));
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
        $items = Item::all();
        foreach ($items as $i) {
            $id_item = $i->id;
            $stock = new AddStock;
            $stock->nama_sbu = $request->nama_sbu;
            $stock->id_item = $id_item;
            $stock->add_stock = $request->$id_item;
            $stock->save();
        }
        return redirect('add-stock');
    }

    public function reload(Request $request){
        $sbus = Sbu::all();
        $items = Item::all();
        $region = $request->nama_sbu;
        $reports = Report::all()->where('nama_sbu', $region);
        // Redirect if no choose region
        if($region=="null"){
            return redirect('dashboard');
        }
        foreach ($reports as $r) {
            $pos = PurchaseOrder::where('nama_sbu', $region)->get();//setiap PO pasti punya PO Number
            $sumQuantity = 0;
            foreach ($pos as $po) {
                $quantity = Nota::where('id_po', $po->po_number)->where('id_item',$r->id_item)->value('quantity');
                $sumQuantity += $quantity;
            }
            $jatahAwal = AddStock::all()->where('nama_sbu', $r->nama_sbu)->where('id_item',$r->id_item)->pluck('add_stock')->sum();
            $jatahSisa = $jatahAwal - $sumQuantity;
            $report[] = array(
                'nama_item' => Item::where('id', $r->id_item)->value('nama_item'),
                'jatah_awal' => $jatahAwal,
                'jatah_sisa' => $jatahSisa,
            );
        }    
        return view('add-stock.index', compact('region','report','sbus','items'));
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
    }
}
