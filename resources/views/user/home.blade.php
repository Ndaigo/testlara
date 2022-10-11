@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h3> {{  Auth::guard('user')->user()->userID }}さんを登録しました！</h3>
                    <h3>email : {{  Auth::guard('user')->user()->email }}</h3>
                    <h3>password : {{  Auth::guard('user')->user()->password }}</h3>
                    <h3>nickname : {{  Auth::guard('user')->user()->nickname}}</h3>

                    <button type="button" onclick="location.href='/book' ">bookへ</button>
                    <button type="button" onclick="location.href='/magazine' ">magazineへ</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
