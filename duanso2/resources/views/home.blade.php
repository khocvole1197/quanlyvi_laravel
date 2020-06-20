@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row  justify-content-center">
            <div class="col-md-2">
                <div class="w3-sidebar w3-light-grey w3-bar-block">
                    <a href="{{route('profile')}}" class="w3-bar-item w3-button">Profile</a>
                    <a href="home" class="w3-bar-item w3-button">Wallet</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <p><b> Wallet </b></p>
                                <div style="padding-top: 30px">
                                    <?php use App\Wallet;$wallet = Wallet::where('user_id', Auth::user()->id)->first(); ?>
                                    <b>Total many: {{$wallet->tongtien}}</b>
                                </div>
                                <div class="row" style="padding-top: 10px;padding-bottom: 30px;">
                                    <div class="col-sm-9 ">
                                        <div class="row">
                                            <div class="col-sm-3 ">
                                                <p>
                                                    <button><a href="{{route('transfersMoney')}}">Transfers</a></button>
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
                                <div class="row col-sm-12">
                                    <div class="col-sm-3">
                                        <button><a href="{{route('home')}}">All</a></button>
                                        |
                                        <button><a href="{{route('onlyRevenue')}}">Revenue</a></button>
                                        |
                                        <button><a href="{{route('onlyExpense')}}">Expense</a></button>
                                    </div>
                                    <div class="col-sm-9">
                                        <form action="{{route('dateForm')}}" method="post">
                                            @csrf
                                            <div class="row">

                                                <div class="col-sm-4">From
                                                    <input type="date" style="size: 10px;" name="from">
                                                </div>
                                                <div class="col-sm-4">To <input type="date" name="to"></div>
                                                <div class="col-sm-2">
                                                    <input type="submit" value="ok">
                                                </div>

                                                <div class="col-sm-2" style="text-align: right">

                                                    <?php

                                                    switch ($check) {
                                                        case 0 :
                                                            echo "  <a href='Export'>Export</a>  ";
                                                            break;
                                                        case 1 :
                                                            echo "  <a href='ExportRevenue'>Export</a>  ";
                                                            break;
                                                        case 2:
                                                            echo "  <a href='ExportExpense'>Export</a>  ";
                                                            break;
                                                    }
                                                    ?>


                                                </div>
                                                @if ($errors->has('from'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('from') }}</strong>
                                                </span>
                                                @endif
                                                @if ($errors->has('to'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('from') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                    <table class="table table-striped"
                                           style="border: 2px solid black;margin-top: 10px;">
                                        <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th style="border-left:2px solid black">Total</th>
                                            <th style="border-left:2px solid black">Description</th>
                                            <th style="border-left:2px solid black">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($datas as $data)
                                            <tr>
                                                @if($data->type==1)
                                                    <td>{{'Revenue'}}</td>
                                                @else
                                                    <td>{{'Expense'}}</td>
                                                @endif
                                                <td style="border-left:2px solid black">{{$data->money}}</td>
                                                <td style="border-left:2px solid black">{{$data->description}}</td>
                                                <td style="border-left:2px solid black">{{$data->updated_at->format('d/m/Y')}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                    </div>
                                    <div class="col-sm-3 ">
                                        {{ $datas->links() }}
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


