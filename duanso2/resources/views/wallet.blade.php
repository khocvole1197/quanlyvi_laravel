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
                    <div class="card-header">Wallet</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button><a href="{{route('createWallet')}}">Create a new wallet</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
