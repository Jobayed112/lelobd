@extends('layouts.home')
@section('title')
Product Page
@endsection
@section('content')
    @include('components.product.offer-product')
    {{-- @include('components.product.trending-collection') --}}
@endsection
