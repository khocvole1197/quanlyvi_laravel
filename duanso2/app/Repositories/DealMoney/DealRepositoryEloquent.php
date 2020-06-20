<?php

namespace App\Repositories\DealMoney;

use App\DealMoney;
use App\Repositories\Wallet\WalletRepository;
use App\User;
use Illuminate\Container\Container as Application;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Validators\DealMoney\DealValidator;

/**
 * Class DealRepositoryEloquent.
 *
 * @package namespace App\Repositories\DealMoney;
 */
class DealRepositoryEloquent extends BaseRepository implements DealRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DealMoney::class;
    }

    protected $modelWallet;

    public function __construct(Application $app, WalletRepository $walletRepository)
    {
        parent::__construct($app);
        $this->modelWallet = $walletRepository;
    }

    // tru tien chi
    public function Tienchi($tienChi, $description)
    {
        $wallet = $this->modelWallet->all()->where('user_id', Auth::user()->id)->first();
        $iduser = $wallet->id;

        $tongTien = $this->modelWallet->find($iduser)->tongtien;
        $tongTien = $tongTien - $tienChi;
        $update = $this->modelWallet->find($iduser);
        $update->tongtien = $tongTien;
        $update->save();
        $this->insertExpense($tienChi, $description);
    }

    public function insertExpense($tienChi, $description)
    {
        $wallet = $this->modelWallet->all()->where('user_id', Auth::user()->id)->first();

        $idChuyenTien = $wallet->id;
        DealMoney::create([
            'user_id' => $idChuyenTien,
            'type' => 0,
            'money' => $tienChi,
            'description' => $description
        ]);
    }

    //congthemtien

    public function congTien($tienThu, $description)
    {
        $wallet = $this->modelWallet->all()->where('user_id', Auth::user()->id)->first();

        $iduser = $wallet->id;

        //thay doi tong tien
        $tongTien = $this->modelWallet->find($iduser)->tongtien;
        $tongTien = $tongTien + $tienThu;
        $update = $this->modelWallet->all()->find($iduser);
        $update->tongtien = $tongTien;
        $update->save();
        //them vao bang revenue
        $nameNguoiNhan = $this->modelWallet->find($iduser)->name;
        $this->insertRevenue($nameNguoiNhan, $tienThu, $description);
    }

    public function insertRevenue($nameNguoiNhan, $tienThu, $description)
    {
        foreach (User::where('name', $nameNguoiNhan)->get('id') as $k) $iduserNhan = $k->id;
        //tim id vi cua nguoi chuyen tien.
        $walletsUerNhan = $this->modelWallet->all()->where('user_id', $iduserNhan)->first();

        $iduserNguoiNhan = $walletsUerNhan->id;

        DealMoney::create([
            'user_id' => $iduserNguoiNhan,
            'type' => 1,
            'money' => $tienThu,
            'description' => $description
        ]);
    }

    //chuyen tien
    public function chuyenTien($tienChi, $nameNguoiNhan, $description)
    {
        $this->infoUser($tienChi);
        $this->insertExpense($tienChi, $description);
        $this->inforUsernhan($tienChi, $nameNguoiNhan);
        $this->insertRevenue($nameNguoiNhan, $tienChi, $description);
    }

    //imfor user chuyen tien
    public function infoUser($tienChi)
    {
        $wallet = $this->modelWallet->all()->where('user_id', Auth::user()->id)->first();

        $idChuyenTien = $wallet->id;
        $tongtien = $this->modelWallet->find($idChuyenTien)->tongtien;
        $tongtien = $tongtien - $tienChi;
        $update = $this->modelWallet->find($idChuyenTien);
        $update->tongtien = $tongtien;
        $update->save();
    }

    //info user nhan tien
    public function inforUsernhan($tienChi, $nameNguoiNhan)
    {
        foreach (User::where('name', $nameNguoiNhan)->get('id') as $k) {
            $iduserNhan = $k->id;
        }

        //tim id vi cua nguoi chuyen tien.
        $walletsUerNhan = $this->modelWallet->all()->where('user_id', $iduserNhan)->first();

        $iduserNguoiNhan = $walletsUerNhan->id;

        $tongTien = $this->modelWallet->find($iduserNguoiNhan)->tongtien;
        $tongTien = $tongTien + $tienChi;
        $update = $this->modelWallet->find($iduserNguoiNhan);
        $update->tongtien = $tongTien;
        $update->save();
    }

    public function getData()
    {
        $wallet = $this->modelWallet->all()->where('user_id', Auth::user()->id)->first();

        $iddeal = $wallet->id;

        return $data = DealMoney::where('user_id', $iddeal)->paginate(3);
    }

    public function getDataOnlyRevenue()
    {
        $wallet = $this->modelWallet->all()->where('user_id', Auth::user()->id)->first();

        $this->iddeal = $wallet->id;

        return $data = DealMoney::where('user_id', $this->iddeal)->where('type', 1)->paginate(3);
    }

    public function getDataOnlyExpense()
    {

        $wallet = $this->modelWallet->all()->where('user_id', Auth::user()->id)->first();

        $this->iddeal = $wallet->id;

        return $data = DealMoney::where('user_id', $this->iddeal)->where('type', 0)->paginate(3);
    }

    public function CreateExpenseAjax($name, $description)
    {
        $wallet = $this->modelWallet->all()->where('user_id', Auth::user()->id)->first();

        $id = $wallet->id;
        DealMoney::create([
            'user_id' => $id,
            'type' => 0,
            'money' => $name,
            'description' => $description,
        ]);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
