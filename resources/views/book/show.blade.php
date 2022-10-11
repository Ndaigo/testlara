@extends('book/layout')
@section('content')
<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>書籍詳細</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="form-group">
                <h3 for="name">書籍名</h3>
                <td>{{ $book->name }}</td>
            </div>
            <div class="form-group">
                <h3 for="price">価格</h3>
                <td>{{ $book->price }}</td>
            </div>
            <div class="form-group">
                <h3 for="author">著者</h3>
                <td>{{ $book->author }}</td>
            </div>
            <div class="form-group">
                <h3 for="name">登録者のID</h3>
                <td>{{ $book->user_id }}</td>
            </div>
            <div class="form-group">
                <h3 for="name">登録者のemail</h3>
                <td>{{ $user->email }}</td>
            </div>
            <div class="form-group">
                <h3 for="name">登録者のNckiname</h3>
                <td>{{ $user->nickname }}</td>
            </div>
            <a href="/book">戻る</a>
        </div>
    </div>
</div>