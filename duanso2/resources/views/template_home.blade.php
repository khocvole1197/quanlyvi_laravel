@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="w3-sidebar w3-light-grey w3-bar-block">
                    <a href="{{route('profile')}}" class="w3-bar-item w3-button">Profile</a>
                    <a href="home" class="w3-bar-item w3-button">Wallet</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <div class="row">
                                <div class="col-sm-12" style="border: 1px solid #1b1e21">
                                    <p>Wallet</p>
                                    <div>
                                        <b>Total many: {{\App\Wallet::find($id)->tongtien}}</b>
                                    </div>
                                    <div class="row" style="padding-top: 10px;padding-bottom: 30px;">
                                        <div class="col-sm-9 ">
                                            <div class="row">
                                                <div class="col-sm-3 ">
                                                    <p>
                                                        <button><a href="{{route('transfersMoney')}}">Transfers</a>
                                                        </button>
                                                    </p>
                                                </div>
                                                <div class="col-sm-3 ">
                                                    <p>
                                                        <button><a href="{{route('revenue1')}}">Revenue</a></button>
                                                    </p>
                                                </div>
                                                <div class="col-sm-3 ">
                                                    <p>
                                                        <button><a href="{{route('espense1')}}">Expense</a></button>
                                                    </p>
                                                </div>
                                                <div class="col-sm-3 ">
                                                    <p>
                                                        <button><a href="{{route('deleteWallet')}}">Delete wallet</a>
                                                        </button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <button><a href="{{route('home')}}">All</a></button>
                                                |
                                                <button><a href="{{route('onelyRevenue')}}">Revenue</a></button>
                                                |
                                                <button><a href="{{route('onelyExpense')}}">Expense</a></button>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-4">From <input type="date" style="size: 10px;"
                                                                                      value=""></div>
                                                    <div class="col-sm-4">To<input type="date"></div>
                                                    <div class="col-sm-2" style="text-align: right"><a
                                                            href="{{route('Export')}}">Export</a></div>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Total</th>
                                                    <th>Description</th>
                                                    <th>Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


