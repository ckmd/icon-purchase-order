<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Report;
use App\AddStock;
use App\AddStockDetail;
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
        $items = Item::all();
        // Membuat Report Secara Otomatis berdasarkan jumlah item dan sbu
        Report::truncate();
        foreach ($sbus as $sbu) {
            foreach ($items as $i) {
                $report = new Report;
                $report->nama_sbu = $sbu->nama_sbu;
                $report->id_item = $i->id;
                $report->nama_item = $i->nama_item;
                $report->jatah_awal = 0;
                $report->jatah_sisa = 0;
                $report->save();
            }
        }
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
        $items = Item::all();
        // Membuat Report Secara Otomatis berdasarkan jumlah item dan sbu
        Report::truncate();
        foreach ($sbus as $sbu) {
            foreach ($items as $i) {
                $report = new Report;
                $report->nama_sbu = $sbu->nama_sbu;
                $report->id_item = $i->id;
                $report->nama_item = $i->nama_item;
                $report->jatah_awal = 0;
                $report->jatah_sisa = 0;
                $report->save();
            }
        }

        $reports = Report::all()->where('nama_sbu', $region);
        // Redirect if no choose region
        if($region=="null"){
            return redirect('dashboard');
        }
        Report::truncate();
        foreach ($reports as $r) {
            $pos = PurchaseOrder::where('nama_sbu', $region)->get();//setiap PO pasti punya PO Number
            $sumQuantity = 0;
            $janQuantity = 0;
            $febQuantity = 0;
            $marQuantity = 0;
            $aprQuantity = 0;
            $meiQuantity = 0;
            $junQuantity = 0;
            $julQuantity = 0;
            $agtQuantity = 0;
            $sepQuantity = 0;
            $oktQuantity = 0;
            $novQuantity = 0;
            $desQuantity = 0;
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
                    case '2019-07':
                        $julQuantity += $quantity;
                        break;
                    case '2019-08':
                        $agtQuantity += $quantity;
                        break;
                    case '2019-09':
                        $sepQuantity += $quantity;
                        break;
                    case '2019-10':
                        $oktQuantity += $quantity;
                        break;
                    case '2019-11':
                        $novQuantity += $quantity;
                        break;
                    case '2019-12':
                        $desQuantity += $quantity;
                        break;
                    default:
                        break;
                }
            }
            $stockCount = AddStock::all()->where('nama_sbu', $r->nama_sbu);
            $jatahAwal = 0;
            foreach ($stockCount as $sc) {
                $jatahAwal += AddStockDetail::all()->where('as_number', $sc->as_number)->where('id_item',$r->id_item)->pluck('add_stock')->sum();
            }
            $jatahSisa = $jatahAwal - $sumQuantity;
            $report = new Report;
            $report->nama_sbu = $r->nama_sbu;
            $report->id_item = $r->id_item;
            $report->nama_item = $r->nama_item;
            $report->jatah_awal = $jatahAwal;
            $report->jatah_sisa = $jatahSisa;
            $report->jan = $janQuantity;
            $report->feb = $febQuantity;
            $report->mar = $marQuantity;
            $report->apr = $aprQuantity;
            $report->mei = $meiQuantity;
            $report->jun = $junQuantity;
            $report->jul = $julQuantity;
            $report->agt = $agtQuantity;
            $report->sep = $sepQuantity;
            $report->okt = $oktQuantity;
            $report->nov = $novQuantity;
            $report->des = $desQuantity;
            $report->save();
        }
        $report = Report::all()->where('nama_sbu', $region);
        return view('dashboard.index', compact('report','region','sbus'));
    }

    public function download(){
        $report = Report::all();
        return view('dashboard.download', compact('report'));
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
