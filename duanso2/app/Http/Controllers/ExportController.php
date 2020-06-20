<?php

namespace App\Http\Controllers;

use App\Exports\DealMoneyExport;
use App\Exports\OnlyExportExpense;
use App\Exports\OnlyRevenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //xuất file excel
    public function exportExcel()
    {
        $name = Auth::user()->name;
        $day = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $string = '[' . $name . $day . ']';

        return Excel::download(new DealMoneyExport(), $string . '.xlsx');
    }

    public function exportRevenue()
    {
        $name = Auth::user()->name;
        $day = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $string = '[' . $name . $day . ']';
        $load = new OnlyRevenue();

        return Excel::download($load, $string . '.xlsx');
    }

    public function exportExvenue()
    {
        $name = Auth::user()->name;
        $day = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $string = '[' . $name . $day . ']';
        $load = new OnlyExportExpense();

        return Excel::download($load, $string . '.xlsx');
    }
}
