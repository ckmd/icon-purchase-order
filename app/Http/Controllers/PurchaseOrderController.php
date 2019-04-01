<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseOrder;
use App\Sbu;
use App\Item;
use App\Nota;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sbus = Sbu::all();
        $pos = PurchaseOrder::all();
        $items = Item::all();
        $notas = Nota::all();
        return view('purchase-order.index', compact('pos','sbus','items','notas'));
    }

    public function detail($po_number){
        $detail_po = PurchaseOrder::where('po_number',$po_number)->first();
        $detailNota = Nota::where('id_po',$po_number)->where('quantity','<>',null)->get();
        $no = 1;
        $total = 0;
        foreach ($detailNota as $i) {
            $itemDetail = Item::where('id', $i->id_item);
            $itemPrice = $itemDetail->value('unit_price');
            $totalPrice = $i->quantity * $itemPrice;
            $items[] = array(
                'no' => $no,
                'item_name' => $itemDetail->value('nama_item'),
                'quantity' => $i->quantity,
                'price' => $itemPrice,
                'total_price' => $totalPrice,
            );
            $no++;
            $total += $totalPrice;
        }
        return view('purchase-order.detail', compact('detail_po', 'items','total'));
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
        $total_price = 0;
        foreach ($items as $i) {
            $id_item = $i->id;
            $nota = new Nota;
            $nota->id_po = $request->po_number;
            $nota->id_item = $id_item;
            $nota->quantity = $request->$id_item;
            $nota->save();
            $total_price += $nota->quantity * $i->unit_price;
        }
        PurchaseOrder::create($request->all());
        return redirect('purchase-order');
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
    public function destroy(Request $request)
    {
        // ketika menghapus purchase order, maka akan menghapus nota yang dimilikinya
        $po = PurchaseOrder::findOrFail($request->id);
        $poInNota = Nota::where('id_po',$po->po_number)->get();
        $poInNota->each->delete();
        $po->delete();
        return back();
    }
}