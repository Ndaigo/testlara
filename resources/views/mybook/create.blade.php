@extends('book/layout')
@section('content')
@include('mybook/form', ['target' => 'store'])
@endsection