<?php

namespace App\Services;


use App\Repositories\DealMoney\DealRepository;
use App\Repositories\Wallet\WalletRepository;

use App\Wallet;
use Illuminate\Support\Facades\Auth;

class ShowData
{
    protected $modelDeal;
    protected $modelWallet;

    public function __construct(DealRepository $repository, WalletRepository $walletRepository)
    {
        $this->modelDeal = $repository;
        $this->modelWallet = $walletRepository;
    }

    public function kiemTraVi()
    {
        $wallet = $this->modelWallet->all()->where('user_id', Auth::user()->id);
        if ($wallet->isEmpty()) {
            //chua co vi;
            return true;
        }
    }
    public function kiemTraGiaoDich()
    {
        $this->modelWallet->all()->where('user_id', Auth::user()->id)->first();
    }

    public function chuaCoGiaoDich()
    {

        $iduser = Auth::user()->id;
        $wallet = $this->modelWallet->all()->where('user_id', Auth::user()->id)->first();
        $iduserWallet = $wallet->user_id;
        $id = $wallet->id;
        if ($iduser == $iduserWallet) {
            return $id;
        }
    }

    public function daCoGiaoDich()
    {
        return $data = $this->modelDeal->getData();
    }
}
