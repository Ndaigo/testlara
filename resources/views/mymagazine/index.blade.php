@extends('book/layout')
@section('content')
<div class="container ops-main">
<div class="row">
    <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <div class="col-md-12">
    <h3> {{  Auth::guard('company')->user()-> companyID }}さんのマイページです</h3>
    </div>
  <div class="col-md-12">
    <h3 class="ops-title">書籍一覧</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">書籍名</th>
        <th class="text-center">価格</th>
        <th class="text-center">著者</th>
        <th class="text-center">登録者companyID</th>
        <th class="text-center">登録者Nickname</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($magazines as $magazine)
      <tr>
          <td>
            <a href="{{route('mymagazine.edit', ['company' => Auth::guard('company')->user()->companyID,'magazine'=>$magazine->magazineid])}}">{{ $magazine->magazineid }}</a>
            </td>
            <td>{{ $magazine->name }}</td>
            <td>{{ $magazine->price }}</td>
            <td>{{ $magazine->author }}</td>
            <td>{{ Auth::guard('company')->user()->companyID }}</td>
            <td>{{ Auth::guard('company')->user()->companyname }}</td>
            <td>
            <form action="/company/{{Auth::guard('company')->user()->companyID}}/magazine/{{ $magazine->magazineid }}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
            </form>
          </td>
      </tr>
      @endforeach
    </table>
    <div><a href="{{route('mymagazine.create',['company' => Auth::guard('company')->user()->companyID])}}" class="btn btn-default">新規作成</a></div>
    <button type="button" onclick="location.href='/user/home' ">Userのhomeへ</button>
    <button type="button" onclick="location.href='/company/home' ">Companyのhomeへ</button>
  </div>
</div>