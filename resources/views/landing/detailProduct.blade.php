@extends('layouts.landing')
@section('landing')
<div id="detail-products">
    <div id="navbar-landing-page" data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">
        <nav-bar></nav-bar>
    </div>
    <detail-products :product='@json($detailProduct)'></detail-products>
    {{-- bagian footer --}}
    <footer-landing></footer-landing>
</div>
@endsection