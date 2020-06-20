<?php

namespace App\Repositories\Wallet;

use Illuminate\Container\Container as Application;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Wallet;

/**
 * Class WalletRepositoryEloquent.
 *
 * @package namespace App\Repositories\Wallet;
 */
class WalletRepositoryEloquent extends BaseRepository implements WalletRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Wallet::class;
    }
    protected $walletModel ;
    public function __construct(Application $app, Wallet $walletModel)
    {
        $this->walletModel = $walletModel;
        parent::__construct($app);
    }

    public function createWallet()
    {
        $this->walletModel->create([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'tongtien' => 10000000
        ]);
    }

    public function deleteWallet()
    {
        Auth::user()->id;
        $del =  $this->walletModel->where('user_id', Auth::user()->id);
        if ($del->delete()) {
            return redirect(route('home'));
        }
    }

    /**
     * Boot up the repository, pushing criteria
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
