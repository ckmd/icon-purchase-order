<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Report;
use App\Item;
use App\PurchaseOrder;
use App\Nota;
use App\Sbu;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sbus = Sbu::all();
        $report = null;
        return view('dashboard.index', compact('report','sbus'));
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
        $sbus = Sbu::all();
        $region = $request->nama_sbu;
        $reports = Report::all()->where('nama_sbu', $region);
        // Redirect if no choose region
        if($region=="null"){
            return redirect('dashboard');
        }
        foreach ($reports as $r) {
            $pos = PurchaseOrder::where('nama_sbu', $region)->get();//setiap PO pasti punya PO Number
            $sumQuantity = 0;
            $janQuantity = 0;
            $febQuantity = 0;
            $marQuantity = 0;
            $aprQuantity = 0;
            $meiQuantity = 0;
            $junQuantity = 0;
            foreach ($pos as $po) {
                $month = date_format(new DateTime($po->po_date), 'Y-m');
                $quantity = Nota::where('id_po', $po->po_number)->where('id_item',$r->id_item)->value('quantity');
                $sumQuantity += $quantity;
                switch ($month) {
                    case '2019-01':
                        $janQuantity += $quantity;
                        break;                
                    case '2019-02':
                        $febQuantity += $quantity;
                        break;
                    case '2019-03':
                        $marQuantity += $quantity;
                        break;                
                    case '2019-04':
                        $aprQuantity += $quantity;
                        break;                
                    case '2019-05':
                        $meiQuantity += $quantity;
                        break;                
                    case '2019-06':
                        $junQuantity += $quantity;
                        break;                
                    default:
                        break;
                }
            }

            $totalUsed = array(1,2,3);
            $jatahSisa = $r->jatah_awal - $sumQuantity;
            $report[] = array(
                'nama_item' => Item::where('id', $r->id_item)->value('nama_item'),
                'jatah_awal' => $r->jatah_awal,
                'jatah_sisa' => $jatahSisa,
                'jan' => $janQuantity,
                'feb' => $febQuantity,
                'mar' => $marQuantity,
                'apr' => $aprQuantity,
                'mei' => $meiQuantity,
                'jun' => $junQuantity,
            );
        }
        return view('dashboard.index', compact('report','region','sbus'));
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
