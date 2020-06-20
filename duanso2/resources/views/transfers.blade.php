@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="w3-sidebar w3-light-grey w3-bar-block">
                    <a href="{{route('profile')}}" class="w3-bar-item w3-button">Profile</a>
                    <a href="home" class="w3-bar-item w3-button">Wallet</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                        <b>Wallet</b>
                        <form action="{{route('transfersMoney1')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-2"> Money</div>
                                            <div class="col-sm-10"><input type="text" name="tienchi">
                                                @if ($errors->has('tienchi'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tienchi') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-top: 10px">
                                        <div class="row">
                                            <div class="col-sm-2"> User</div>
                                            <div class="col-sm-10">
                                                <select style="width: 180px " name="userNhanTien" required>
                                                    @foreach(\App\Wallet::all()->whereNotIn('name',Auth::user()->name) as $user)
                                                        <option value=" {{$user->name}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-top: 10px;text-align: left">
                                        <div class="row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-1">
                                                <input type="submit" value="Execute">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
