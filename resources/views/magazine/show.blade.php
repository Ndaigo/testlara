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
                <td>{{ $magazine->name }}</td>
            </div>
            <div class="form-group">
                <h3 for="price">価格</h3>
                <td>{{ $magazine->price }}</td>
            </div>
            <div class="form-group">
                <h3 for="publisher">著者</h3>
                <td>{{ $magazine->publisher }}</td>
            </div>
            <div class="form-group">
                <h3 for="name">登録者のID</h3>
                <td>{{ $magazine->company_id }}</td>
            </div>
            <div class="form-group">
                <h3 for="name">登録者のemail</h3>
                <td>{{ $company->email }}</td>
            </div>
            <div class="form-group">
                <h3 for="name">登録者のNckiname</h3>
                <td>{{ $company->companyname }}</td>
            </div>
            <a href="/magazine">戻る</a>
        </div>
    </div>
</div>