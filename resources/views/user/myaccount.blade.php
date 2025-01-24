@extends('layouts.user')
@section('user')
    <div id="myaccount">
        <my-account :data-account="{{auth()->user()}}"></my-account>
    </div>
@endsection
