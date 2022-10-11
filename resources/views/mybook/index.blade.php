@extends('book/layout')
@section('content')
<div class="container ops-main">
<div class="row">
    <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <div class="col-md-12">
    <h3> {{  Auth::guard('user')->user()-> userID }}さんのマイページです</h3>
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
        <th class="text-center">登録者UserID</th>
        <th class="text-center">登録者Nickname</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($books as $book)
      <tr>
          <td>
            <a href="{{route('mybook.edit', ['user' => Auth::guard('user')->user()->userID,'book'=>$book->bookid])}}">{{ $book->bookid }}</a>
            </td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ Auth::guard('user')->user()->userID }}</td>
            <td>{{ Auth::guard('user')->user()->nickname }}</td>
            <td>
            <form action="/user/{{Auth::guard('user')->user()->userID}}/book/{{ $book->bookid }}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
            </form>
          </td>
      </tr>
      @endforeach
    </table>
    <div><a href="{{route('mybook.create',['user' => Auth::guard('user')->user()->userID])}}" class="btn btn-default">新規作成</a></div>
    <button type="button" onclick="location.href='/user/home' ">homeへ</button>
  </div>
</div>