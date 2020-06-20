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
                    <div class="card-header">Profile</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <form action="{{route('UpdateInfo')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-5 col-form-label text-sm-left"
                                           style="text-align: left">{{ __('Name') }}</label>
                                    <div class="col-md-7">
                                        <input id="name" type="text" class="form-control" name="name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-5 col-form-label text-sm-left"
                                           style="text-align: left">{{ __('Password:') }}</label>
                                    <div class="col-md-7">
                                        <input id="name" type="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pwd" class="col-md-5 col-form-label text-sm-left">Re-Password:</label>
                                    <div class="col-md-7">
                                        <input id="name" type="password" class="form-control" name="repassword">
                                        @if ($errors->has('repassword'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('repassword') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md text-sm-right">
                                        <button type="submit" class="btn btn-primary ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
