<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>書籍登録</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            
            @include('mymagazine/message')

            @if($target == 'store')
            <form action="/company/{{Auth::guard('company')->user()->companyID}}/magazine" method="post">
            @elseif($target == 'update')
            <form action="/company/{{Auth::guard('company')->user()->companyID}}/magazine/{{$magazine->magazineid}}" method="post">
                <input type="hidden" name="_method" value="PUT">
            @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name">書籍名</label>
                    <input type="text" class="form-control" name="name" value="{{ $magazine->name }}">
                </div>
                <div class="form-group">
                    <label for="price">価格</label>
                    <input type="text" class="form-control" name="price" value="{{ $magazine->price }}">
                </div>
                <div class="form-group">
                    <label for="publisher">著者</label>
                    <input type="text" class="form-control" name="publisher" value="{{ $magazine->publisher }}">
                </div>
                <button type="submit" class="btn btn-default">登録</button>
                <a href="{{route('mymagazine.index',['company' => Auth::guard('company')->user()->companyID]}}">戻る</a>
            </form>
        </div>
    </div>
</div>