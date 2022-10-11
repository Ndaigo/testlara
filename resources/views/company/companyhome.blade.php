@extends('company.layout')
@section('content')
<div class="container">
    <div class="card-body">
        <h3> {{ Auth::guard('company')->user()-> companyID }}社のhomeページです</h3>
        <h3>email : {{ Auth::guard('company')->user()->email }}</h3>
        <h3>password : {{ Auth::guard('company')->user()->password }}</h3>
        <h3>nickname : {{ Auth::guard('company')->user()->companyname}}</h3>
    </div>
    <div>
      <a href="{{route('mymagazine.index', ['company' => Auth::guard('company')->user()->companyID])}}">MyMagazineへ</a>
      <a href="/magazine">Magazineへ</a>
      <a href="/book">Bookへ</a>
    </div>
</div>
@endsection