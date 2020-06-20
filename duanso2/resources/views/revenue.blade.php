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
                    <div class="card-header">Wallet > Revenue</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-2"> Money</div>
                                        <div class="col-sm-10">
                                            <input type="text" name="tienthu">
                                            @if ($errors->has('tienthu'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('tienthu') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-top: 10px">
                                    <div class="row">
                                        <div class="col-sm-2"> Desciption</div>

                                        <div class="col-sm-10"><textarea name="description"></textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-top: 10px;text-align: left">
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-1"><input type="submit" name="submidform" value="Execute">
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
@endsection


