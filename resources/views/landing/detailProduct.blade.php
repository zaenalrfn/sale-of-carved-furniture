@extends('layouts.landing')
@section('landing')
<div id="detail-products">
    <detail-products :product='@json($detailProduct)'></detail-products>
</div>
@endsection