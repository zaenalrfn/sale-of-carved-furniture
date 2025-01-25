@extends('layouts.user')
@section('user')
<div id="checkout">
    {{-- navbar --}}
    <div id="navbar-landing-page"
        data-authenticated="{{ auth()->check() && auth()->user()->role == 'user' ? 'true' : 'false' }}">
        <nav-bar></nav-bar>
    </div>
    <checkout :data-cart='@json($carts)'></checkout>
    {{-- bagian footer --}}
    <footer-landing></footer-landing>
</div>
@endsection