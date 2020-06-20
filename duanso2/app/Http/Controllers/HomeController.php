<?php

namespace App\Http\Controllers;

use App\DealMoney;
use App\Expense;
use App\Http\Requests\SearchFromTo;
use App\Repositories\DealMoney\DealRepository;
use App\Revenue;
use App\Services\ShowData;
use App\Services\ShowDataServices;
use App\Wallet;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $modelDeal;
    protected $showData;

    public function __construct(DealRepository $dealMoney, ShowData $showData)
    {

        $this->modelDeal = $dealMoney;
        $this->showData = $showData;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ($this->showData->kiemTraVi()) {
            //chua co vi;
            return view('wallet');
        } else {
            //co vi roi;
            if ($this->showData->kiemTraGiaoDich()) {
                $id = $this->showData->chuaCoGiaoDich();
                return view('template_home', compact('id'));
            } else {
                $datas = $this->showData->daCoGiaoDich();
                $check = 0;
                return view('home', compact('datas', 'check'));
            }
        }
    }

    // hien thi duy nhat doanh thu
    public function onelyRevenue()
    {

        $datas = $this->modelDeal->getDataOnlyRevenue();
        $check = 1;

        return view('home', compact('datas', 'check'));
    }

    // hien thi duy nhat chi
    public function onelyExpense()
    {

        $datas = $this->modelDeal->getDataOnlyExpense();
        $check = 2;
        return view('home', compact('datas', 'check'));
    }

    //hien thi theo ngaythang
    public function dateFromTo(SearchFromTo $request)
    {
        //ngaythang nhap vao.
        $from = $request->from;
        $to = $request->to;

        $wallet = Wallet::all()->where('user_id', Auth::user()->id)->first();
        $iddeal = $wallet->id;

        $data['datas'] =
            DealMoney::whereDate('updated_at', '>=', $from)
                ->whereDate('updated_at', '<=', $to)
                ->where('user_id', $iddeal)
                ->get();
        return view('form_to', $data);
    }

}
