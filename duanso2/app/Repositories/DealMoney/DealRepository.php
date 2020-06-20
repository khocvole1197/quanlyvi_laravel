<?php

namespace App\Repositories\DealMoney;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DealRepository.
 *
 * @package namespace App\Repositories\DealMoney;
 */
interface DealRepository extends RepositoryInterface
{
    public function Tienchi($tienChi, $description);

    public function insertExpense($tienChi, $description);

    public function congTien($tienThu, $description);

    public function insertRevenue($nameNguoiNhan, $tienThu, $description);

    public function chuyenTien($tienChi, $nameNguoiNhan, $description);

    public function infoUser($tienChi);

    public function inforUsernhan($tienChi, $nameNguoiNhan);

    public function getData();

    public function getDataOnlyRevenue();

    public function getDataOnlyExpense();

    public function CreateExpenseAjax($name, $description);
}
