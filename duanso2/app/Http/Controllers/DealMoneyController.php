<?php

namespace App\Http\Controllers;

use App\DealMoney;
use App\Exports\DealMoneyExport;
use App\Http\Requests\WalletFormRevenue;
use App\Http\Requests\WalletFormTransfers;
use App\Repositories\DealMoney\DealRepository;
use App\Repositories\Wallet\WalletRepository;
use App\Revenues;
use Illuminate\Support\Facades\Auth;


class DealMoneyController extends Controller
{

    protected $dealModel;
    protected $walletModel;

    public function __construct(DealRepository $modelDeal, WalletRepository $walletRepository)
    {
        $this->dealModel = $modelDeal;
        $this->walletModel = $walletRepository;
    }


    //hiển thị view thêm doanh thu.
    public function revenue()
    {
        return view('revenue');
    }

    // hien thi view chi tien
    public function expenseMoney()
    {
        return view('expense');
    }

    //cong tien do  nguoi khac chuyen cho
    public function updateMoney(WalletFormRevenue $request)
    {
        $tienThu = $request->tienthu;
        $description = $request->description;
        $this->dealModel->congTien($tienThu, $description);
        $request->session()->flash('status', 'Thêm khoản thu thành công!');
        return redirect(route('revenue1'));
    }

    //tru tien do chuyen cho nguoi khac
    public function updateMoneyExpense(WalletFormRevenue $request)
    {
        $tienChi = $request->tienthu;
        $description = $request->description;
        $this->dealModel->Tienchi($tienChi, $description);
        $request->session()->flash('status', 'Thêm khoản chi thành công!');
        return redirect(route('espense1'));
    }

    //tao vi
    public function createWallet()
    {
        $this->walletModel->createWallet();
        return redirect(route('home'));
    }


    // view thực hiện giao dịch
    public function transfersMoney()
    {
        return view('transfers');
    }

    //logic giaodich
    public function transfersMoney1(WalletFormTransfers $request)
    {

        // tru tien cua nguoi chuyen va luu thong tin vao bang dealmoney

        $tienChi = $request->tienchi;
        $nameNguoiNhan = $request->userNhanTien;
        $description = Auth::user()->name . ' chuyển tiền cho ' . $request->userNhanTien;
        $this->dealModel->chuyenTien($tienChi, $nameNguoiNhan, $description);
        return redirect()->route('transfersMoney')->with('success', 'Chuyển tiền thành công');
    }

    //xoa vi
    public function deleteWallet()
    {
        $this->walletModel->deleteWallet();
        return redirect(route('home'));
    }

}
