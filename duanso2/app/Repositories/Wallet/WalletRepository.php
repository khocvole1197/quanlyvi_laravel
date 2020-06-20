<?php

namespace App\Repositories\Wallet;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface WalletRepository.
 *
 * @package namespace App\Repositories\Wallet;
 */
interface WalletRepository extends RepositoryInterface
{
    //
    /**
     * @return mixed
     */
    public function createWallet();

    public function deleteWallet();

}
