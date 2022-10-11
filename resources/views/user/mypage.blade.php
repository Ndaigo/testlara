<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container">
    <div class="card-body">
        <h3> {{ Auth::guard('user')->user()-> userID }}さんのマイページです</h3>
        <h3>email : {{ Auth::guard('user')->user()->email }}</h3>
        <h3>password : {{ Auth::guard('user')->user()->password }}</h3>
        <h3>nickname : {{ Auth::guard('user')->user()->nickname}}</h3>
    </div>
    <div>
      <a class="dropdown-item" href="{{ route('password.form') }}">Change Password</a>
    </div>
    <div>
      <a class="" href="/user/home">戻る</a>
    </div>
    <div>
      <a href="{{route('mybook.index', ['user' => Auth::guard('user')->user()->userID])}}">MyBookへ</a>
      <a href="/book">Bookへ</a>
    </div>
    <div>
    <a href="/magazine">magazineへ</a>
    </div>
    <div><button type="button" onclick="location.href='{{ route('mybook.create',['user' => Auth::guard('user')->user()->userID]) }}' ">Book新規登録</button></div>
</div>