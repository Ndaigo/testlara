@extends('book/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
  </a>
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
      </tr>
      @foreach($books as $book)
      <tr>
        <td>
          <a href="/book/{{ $book->bookid }}">{{ $book->bookid }}</a>
        </td>
        <td>{{ $book->name }}</td>
        <td>{{ $book->price }}</td>
        <td>{{ $book->author }}</td>
        @foreach ($users as $user)
          {{--booksのuser_idと同じuserのuserIDの情報だけを出力--}}
          @if($book->user_id == $user->userID)
            <td>{{ $user->userID }}</td>
            <td>{{ $user->nickname }}</td>
          @endif
        @endforeach
        <td>
        </td>
      </tr>
      @endforeach
    </table>
    <div>
      @if(Auth::guard('user')->check())
        <a href="{{ route('mybook.create',['user' => Auth::guard('user')->user()->userID]) }}" class="btn btn-default">
      @else
        <a href="{{ route('login') }}" class="btn btn-default">
      @endif
      新規作成</a></div>
    <button type="button" onclick="location.href='/user/home' ">Userのhomeへ</button>
    <button type="button" onclick="location.href='/company/home' ">Companyのhomeへ</button>
  </div>
</div>