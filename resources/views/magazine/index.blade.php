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
        <th class="text-center">登録者companyID</th>
        <th class="text-center">登録者Nickname</th>
      </tr>
      @foreach($magazines as $magazine)
      <tr>
        <td>
          <a href="/magazine/{{ $magazine->magazineid }}">{{ $magazine->magazineid }}</a>
        </td>
        <td>{{ $magazine->name }}</td>
        <td>{{ $magazine->price }}</td>
        <td>{{ $magazine->publisher }}</td>
        @foreach ($companies as $company)
          {{--booksのuser_idと同じuserのuserIDの情報だけを出力--}}
          @if($magazine->company_id == $company->companyID)
            <td>{{ $company->companyID }}</td>
            <td>{{ $company->companyname }}</td>
          @endif
        @endforeach
        <td>
        </td>
      </tr>
      @endforeach
    </table>
    <div>
      @if(Auth::guard('company')->check())
        <a href="{{ route('mymagazine.create',['company' => Auth::guard('company')->user()->companyID]) }}" class="btn btn-default">
      @else
        <a href="{{ route('company.login') }}" class="btn btn-default">
      @endif
      新規作成</a></div>
    <button type="button" onclick="location.href='/company/home' ">homeへ</button>
  </div>
</div>